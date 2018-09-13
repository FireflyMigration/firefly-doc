Sometimes you want to track down an update to a specific entity or a specific column. You can do that by overriding the `OnSavingRow` Entity method or by handle the `ValueChange` event of a column.
## overriding the `OnSavingRow` method of an entity
As of version 30735 a new method was added to entity called `OnSavingRow`
The `OnSavingRow` event of entities is called after the `Controller`'s OnSavingRow and before the entity is saved to the database. 
You can put all sorts of logic in such methods and you can also use it for debugging purposes. For example:
```csdiff
public class Orders : Entity
{
    #region Columns
    ...
    #endregion
    public Orders() : base("dbo.Orders", "Orders", Northwind.Shared.DataSources.Northwind1)
    {
        Cached = false;
        InitializeIndexes();
    }
+   protected override void OnSavingRow(IEntityOnSavingRowEventArgs e)
+   {
+       if (e.Activity == Activities.Insert && this.OrderDate.WasChanged)
+       {
+           System.Diagnostics.Debug.WriteLine("Order Date was Changed from:" + OrderDate.OriginalValue + " to: " + OrderDate.Value);
+       }
+       base.OnSavingRow(e);
+   }
```

## Handling the ValueChange event of a column
Sometimes if you want to see what code exactly updates a column, simply handle it's `ValueChanged` event and add a breakpoint in it.
For example the following code will write to the output whenever the OrderDate is actually changed (way before it's saved to the database)
```csdiff
public Orders() : base("dbo.Orders", "Orders", Northwind.Shared.DataSources.Northwind1)
{
    Cached = false;
    InitializeIndexes();
+   OrderDate.ValueChanged += e =>
+   {
+       System.Diagnostics.Debug.WriteLine("OrderDate was changed from " + e.PreviousValue + " to " + OrderDate.Value);
+   };
}
```