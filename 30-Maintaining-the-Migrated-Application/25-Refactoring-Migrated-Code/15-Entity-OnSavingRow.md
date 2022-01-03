keywords: refactor, refactoring,relation,entity

In many cases in an application you have business logic that has to do with a specific entity, for example you may have a column in the Entity called `LastChangeDate` and `LastChangeTime`.
To maintain these you have to add code in the `OnSavingRow` of each controller that "may" update this entity.

Also - you may have all sorts of validations that should be the same when the user inputs and when there is an automatic import process.

These are the exact problems that `OnSavingRow` in the `Entity` class can solve (since version 30725).
The `OnSavingRow` in the `Entity` class is called immediately after the `OnSavingRow` of the specific controller, for each entity that is updated, deleted or inserted.

The `OnSavingRow` event receives an event args that specify the specific activity - `Insert`, `Update` or `Delete`

Here's an example of it's usage:
```csdiff
public class Customers : Entity 
{
    #region Columns
    ...
    public readonly DateColumn LastChangeDate = new DateColumn();
    public readonly TimeColumn LastChangeTime = new TimeColumn();
    #endregion
    #region Indexes
    ...
    #endregion
    public Customers() : base("dbo.Customers", "Customers", Northwind.Shared.DataSources.Northwind1)
    {
        Cached = false;
        CustomerID.ClearExpandEvent();
        InitializeIndexes();
    }
+   protected override void OnSavingRow(IEntityOnSavingRowEventArgs e)
+   {
+       LastChangeDate.Value = Date.Now;
+       LastChangeTime.Value = Time.Now;
+   }
```

## Automatically adding Columns to all Controller
If you want to make sure that specific columns in an entity will always be added to all Controllers that use this Entity, override the `GetMandatoryColumns` method

```csdiff
public class Customers : Entity 
{
    #region Columns
    ...
    public readonly DateColumn LastChangeDate = new DateColumn();
    public readonly TimeColumn LastChangeTime = new TimeColumn();
    #endregion
    #region Indexes
    ...
    #endregion
    public Customers() : base("dbo.Customers", "Customers", Northwind.Shared.DataSources.Northwind1)
    {
        Cached = false;
        CustomerID.ClearExpandEvent();
        InitializeIndexes();
    }
    protected override void OnSavingRow(IEntityOnSavingRowEventArgs e)
    {
        LastChangeDate.Value = Date.Now;
        LastChangeTime.Value = Time.Now;
    }
+   protected override ColumnBase[] GetMandatoryColumns()
+   {
+       return new ColumnBase[] { LastChangeDate, LastChangeTime };
+   }
```


