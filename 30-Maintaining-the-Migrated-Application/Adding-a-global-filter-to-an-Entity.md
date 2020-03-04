Sometimes we would like to restrict the data that a user can see - for example, a specific user should only be able to see customers who are in London.

The long and scary way to do it is to remember to add that filter in every controller that we have and hope that we haven't missed any controller and that we'll remember this for any new controller.

Another approach is to add that filter in the code that is used by all controller - so it'll automatically be added to any query that I'll do.

Here's how to do that:

First, we'll start by adding an overridable method in Entity in ENV, that will allow us to determine the filter for each entity.

## Step 1
In the Entity class in  `Entity.cs` in ENV, we'll add the following code:
```csdiff
+protected virtual FilterBase GetGlobalFilter()
+{
+   return null;
+}
```

## Step 2
We'll override that method in the entities to which we would like to add a global filter,
for example in `Customers.cs`
```csdiff
using Firefly.Box;
using ENV.Data;
+using Firefly.Box.Data.Advanced;

namespace Northwind.Models
{
    /// <summary>Customers(E#1)</summary>
    public class Customers : Entity 
    {
        #region Columns
        [PrimaryKey]
        public readonly Types.CustomerID CustomerID = new Types.CustomerID("CustomerID");
        public readonly TextColumn CompanyName = new TextColumn("CompanyName", "40");
        public readonly TextColumn ContactName = new TextColumn("ContactName", "30");
        ...
+       protected override FilterBase GetGlobalFilter()
+       {
+           return City.IsEqualTo("London");
+       }
        ...
    }
}

```

and we can do the same for `Orders.cs`
```csdiff
using Firefly.Box;
using ENV.Data;
using Firefly.Box.Data.Advanced;

namespace Northwind.Models
{
    /// <summary>Orders(E#2)</summary>
    public class Orders : Entity 
    {
        #region Columns
        [PrimaryKey]
        public readonly Types.OrderID OrderID = new Types.OrderID("OrderID") { ReadOnlyForExistingRows = true, NullDisplayText = "" };
        public readonly Types.CustomerID CustomerID = new Types.CustomerID("CustomerID") { NullDisplayText = "" };
        public readonly NumberColumn EmployeeID = new NumberColumn("EmployeeID", "N10") { AllowNull = false, NullDisplayText = "", DbType = "INTEGER" };
    ...
+       protected override FilterBase GetGlobalFilter()
+       {
+           return ShipCity.IsEqualTo("London");
+       }
    ...
    }
}
```

## Step 3
We'll need to adjust the ENV code to use this filter, and add it everywhere we need it.

We'll start by adjusting the Entity methods (count, max etc....)

In `Entity.cs`
```csdiff
void OperateOnRows(FilterBase where, Action<IDbCommand> doOnSqlCommand, Action<Row> doOnRowForNonSQL)
{
    var ds = DataProvider as DynamicSQLSupportingDataProvider;
+   var additionalWhere = GetGlobalFilter();
+   if (additionalWhere != null)
+   {
+       var fc = new FilterCollection();
+       fc.Add(where);
+       fc.Add(additionalWhere);
+       where = fc;
+   }

    if (ds != null && !(ds is MockTestingDatabase))
    {

```

## Step 4
We'll add code in Entity to add the Global filter to filters that are used in the `SqlClient`

In  the Entity class in `Entity.cs` we'll add the following method and class:
```csdiff
+internal IFilter DecorateWhere(IFilter where)
+{
+    var x = this.GetGlobalFilter();
+    if (x == null)
+        return where;
+    return new FilterJoiner(where, FilterBase.GetIFilter(x, false, this));
+
+
+}
+class FilterJoiner : IFilter
+{
+    IFilter[] _filters;
+
+    public FilterJoiner(params IFilter[] filters)
+    {
+        _filters = filters;
+    }
+
+    public void AddTo(IFilterBuilder builder)
+    {
+        foreach (var f in _filters)
+        {
+            f.AddTo(builder);
+        }
+    }
+}
```

Essentially the `DecoreateWhere` method checks if there is any global filter set, and there is one, it returns a new instance of the `FilterJoiner` class that merges the GlobalFilter with the specific filter.


## Step 5
We'll adjust the code that is used by all controllers to access the data from sql databases, we'll adjust the `SqlSelectCommand` class in the `SqlClient.cs` file

In `SqlClient.cs` file:
```csdiff
internal class SQLSelectCommand
{
    ...

    public SQLSelectCommand(Firefly.Box.Data.Entity entity, SQLDataProviderHelper parent, IEnumerable<ColumnBase> selectedColumns, IFilter where, Sort sort, IEnumerable<IJoin> joins, bool disableCache, string entityName)
    {
        _entityName = entityName;

        _entity = entity;
+       {
+           var envEntity = entity as ENV.Data.Entity;
+           if (envEntity != null)
+           {
+               where = envEntity.DecorateWhere(where);
+           }
+       }
```
First we're checking if the entity is of type `ENV.Data.Entity` and if it is we're replacing the where, the where as it was decorated by the Entity.

## Step 6
We also need to adjust the Where of Join statements,

```csdiff
 internal class SQLSelectCommand
{
   ...
+   class myJoin : IJoin
+   {
+       public Firefly.Box.Data.Entity Entity { get;  }
+       public IFilter Where { get;  }
+
+       public bool IsOuterJoin { get;  }
+
+       public myJoin(Firefly.Box.Data.Entity entity, IFilter where, bool isOuterJoin)
+       {
+           Entity = entity;
+           Where = where;
+           IsOuterJoin = isOuterJoin;
+       }
+   }
+
    public SQLSelectCommand(Firefly.Box.Data.Entity entity, SQLDataProviderHelper parent, IEnumerable<ColumnBase> selectedColumns, IFilter where, Sort sort, IEnumerable<IJoin> joins, bool disableCache, string entityName)
    {
        _entityName = entityName;

        _entity = entity;
        {
            var envEntity = entity as ENV.Data.Entity;
            if (envEntity != null)
            {
                where = envEntity.DecorateWhere(where);
            }
        }
+       var tempJoins = new List<IJoin>(joins);
+
+       for (int i = 0; i < tempJoins.Count; i++)
+       {
+           var join = tempJoins[i];
+           var joinEnvEntity = join.Entity as ENV.Data.Entity;
+           if (joinEnvEntity != null) {
+               tempJoins[i] = new myJoin(joinEnvEntity, joinEnvEntity.DecorateWhere(join.Where), join.IsOuterJoin);
+               
+           }
+       }
+       joins = tempJoins;

        _parent = parent;
        _where = where;
        _sort = sort;
```

## Step 7
Lastly we need to handle the `CountRows` method in the `SqlClient` that is used for implementing `DbRecs`

```csdiff
public long CountRows(Firefly.Box.Data.Entity entity)
{
+   var envEntity = entity as ENV.Data.Entity;
+   if (envEntity != null)
+   {
+       return envEntity.CountRows(new FilterCollection());
+   }

    using (var c = CreateCommand())
    {
        c.CommandText = "Select count(*) " + NewLineInSQL + "From " + _client.GetEntityName(entity);
        return Number.Cast(c.ExecuteScalar());
    }
}
```




That's it, you're done and this filter will be automatically applied anywhere you'll use these entities without having to specify it in each and every controller.

## Entity Hierarchy
Sometimes we want to restrict the rows in a detail table based on data from the master table, for example, only show rows in OrderDetails where the order is from the city London.

Here's how it's done:
```csdiff
using Firefly.Box;
using ENV.Data;
+using Firefly.Box.Data.Advanced;

namespace Northwind.Models
{
    /// <summary>Order_Details(E#3)</summary>
    public class Order_Details : Entity 
    {
        #region Columns
       ...
+       protected override FilterBase GetGlobalFilter()
+       {
+           var o = new Orders();
+           var fc = new FilterCollection();
+           fc.Add("{0} in (select " + o.OrderID.Name +
+               " from " + o.EntityName + 
+               " where " + o.ShipCity.Name + " = {1} and "
+               + o.OrderID.Name + " = {0})",
+               this.OrderID, "London");
+           return fc;
+       }
    }
}
```

> Note that when we want to specify columns from this Entity, we use the `{0}` syntax, similar to string format. This assures that the actual name of the column that is going to be used when this query is run, will also respect the alias that this entity has in that specific controller.
> For Orders entity, that did not exist in the original query, we use the `Name` property of the colun