keywords:bulk insert 
# Improve Performance of InsertIfNotFound using Memory Database and Bulk Copy
Often we need to insert many rows to the database, while making sure that these rows don't already exist.
We use the `InsertIfNotFound` relation for that.

As the number of rows grows, the cost of checking in the db if the row exists, and inserting the rows one by one can be significant.

Let's use the following code as an example, it makes sure that all the customers in a specific country have an order
```csdiff
public class VerifyOrdersOfCustomer : BusinessProcessBase
{
    readonly Models.Customers Customers = new Models.Customers();
    readonly Models.Orders Orders = new Models.Orders();
    TextColumn _pCountry = new TextColumn();
        

    public VerifyOrdersOfCustomer()
    {
        From = Customers;
        Where.Add(Customers.Country.IsEqualTo(_pCountry));
        Relations.Add(Orders,RelationType.InsertIfNotFound, 
            Orders.CustomerID.BindEqualTo(Customers.CustomerID));
    }
    protected override void OnLeaveRow()
    {
          if (!Relations[Orders].RowFound)
          {
                Orders.OrderID.Value = 20000 + Counter;
                Orders.ShipCountry.Value = Customers.Country;
          }
    }
    public void Run(TextParameter country)
    {
        BindParameter(_pCountry, country);
        Execute();
    }
}
```

We're going to change this code, so that instead of processing the rows one by one, we'll first load the relevant rows into memory, 
We'll process them in memory, and save them to the db when we are done.

### Step 1, change our Orders entity and make it memory enabled
In the `Orders.cs` file we'll change its constructor and add another one
```csdiff

-public Orders() : base("dbo.Orders", "Orders", Shared.DataSources.Northwind) 
+public Orders(bool inMemory) : base("dbo.Orders", "Orders", SqlHelper.GetMemoryOrReal(inMemory, Shared.DataSources.Northwind))
{...}
+public Orders() : this(false) { }
```

That way, when we create an instance of this class, we can decide if we want an in memory version of it.
> you can find the source of the `SqlHelper` class further done this article

### Step 2, adjust our controller
Now we'll Change our controller to use the in memory version while it is running, and insert the rows once it's done
```csdiff
public class VerifyOrdersOfCustomer : BusinessProcessBase
{
    readonly Models.Customers Customers = new Models.Customers();
    readonly Models.Orders Orders = new Models.Orders();
+   readonly Models.Orders Orders = new Models.Orders(true);//the controller uses the in memory version of the code
    TextColumn _pCountry = new TextColumn();

...
    public void Run(TextParameter country)
    {
        BindParameter(_pCountry, country);
        Execute();
+       var real = new Models.Orders();
+       SqlHelper.CopyData(Orders, real);
+       Orders.Truncate();//cleanup of the Orders in memory data
    }
}
```

1. We've changed the controller to use the in memory version of the table
2. Once the controller is done, we use the CopyData method to copy the in memory data to the database

## The CopyData Method
The `CopyData` method is optimized for performance. In fact - for SQL server it actually uses the BulkCopy option of Sql Server, improving the performance of inserting rows by more than 90%.
Instead of sending many insert statements, it sends all the data in a bulk.

### Step 3, handling existing rows
So far our example was good for only new rows, now we'll adjust it for existing rows as well.
Basically we'll start by loading the data of our range from the db, then before writing it - we'll delete its existing version in the database and insert the version that exists in memory.

```csdiff
public void Run(TextParameter country)
{
    BindParameter(_pCountry, country);

+   var real = new Models.Orders();
+   var where = real.ShipCountry.IsEqualTo(country.Value);
+   //copy the data from the database to the memory version
+   SqlHelper.CopyData(real, Orders, where);
+   //delete the data in the database before we insert the values from the memory
+   real.Delete(where);

    Execute();
    //Insert the rows from the memory to the database
    SqlHelper.CopyData(Orders, real);
    Orders.Truncate();//cleanup of the Orders in memory data
}
```



## SqlHelper Source
```csdiff
using ENV.Data;
using ENV.Data.DataProvider;
using Firefly.Box;
using Firefly.Box.Data.Advanced;
using Firefly.Box.Data.DataProvider;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind
{
    public class SqlHelper
    {
        public static IEntityDataProvider GetMemoryOrReal(bool useMemory, IEntityDataProvider originalConnection)
        {
            if (useMemory)
                return ENV.Data.DataProvider.MemoryDatabase.Instance;
            else
                return originalConnection;
        }
        public static void CopyData(Entity sourceTable, Entity targetTable, FilterBase sourceTableWhere = null)
        {
            using (ENV.Utilities.Profiler.StartContext("Copy Data To " + targetTable.GetType().Name))
            {
                #region Try use Sql Bulk Insert
                if (sourceTableWhere == null && sourceTable.DataProvider is MemoryDatabase && targetTable.DataProvider is DynamicSQLSupportingDataProvider)
                {
                    using (var c = ((DynamicSQLSupportingDataProvider)targetTable.DataProvider).CreateCommand())
                    {
                        var sqlConn = c.Connection as System.Data.SqlClient.SqlConnection;
                        if (sqlConn != null)
                        {
                            using (ENV.Utilities.Profiler.StartContext("Bulk Insert Into " + targetTable.GetType().Name))
                            {
                                var bc = new System.Data.SqlClient.SqlBulkCopy(sqlConn,
                                  System.Data.SqlClient.SqlBulkCopyOptions.
                                      KeepIdentity, (System.Data.SqlClient.SqlTransaction)c.Transaction);
                                bc.BulkCopyTimeout = 0;
                                bc.DestinationTableName = targetTable.EntityName;
                                foreach (var item in targetTable.Columns)
                                {
                                    if (!item.DbReadOnly)
                                        bc.ColumnMappings.Add(item.Name, item.Name);
                                }
                                bc.WriteToServer(((MemoryDatabase)sourceTable.DataProvider).DataSet.Tables[sourceTable.EntityName]);
                                return;
                            }
                        }
                    }
                }
                #endregion



                var bp = new BusinessProcess { From = sourceTable };
                if (sourceTableWhere != null)
                    bp.Where.Add(sourceTableWhere);
                bp.Relations.Add(targetTable, RelationType.Insert);
                bp.ForEachRow(() =>
                {
                    foreach (var column in targetTable.Columns)
                    {
                        if (!column.DbReadOnly)
                        {
                            column.Value = sourceTable.Columns[column.Name];
                        }
                    }
                });
            }
        }
    }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/SHGamJfJhXY?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>
