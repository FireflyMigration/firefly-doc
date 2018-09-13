In many cases in an application you have business logic that has to do with a specific entity, for example you may have a column in the Entity called `LastUpdateUser` and `LastUpdateDate`.
To maintain these you have to add code in the `OnSavingRow` of each controller that "may" update this entity.

Also - you may have all sorts of validations that should be the same when the user inputs and when there is an automatic import process.

These are the exact problems that `OnSavingRow` in the `Entity` class can solve (since version 30725).
The `OnSavingRow` in the `Entity` class is called immediately after the `OnSavingRow` of the specific controller, for each entity that is updated, deleted are inserted.

The `OnSavingRow` event recieves and event args that specify the specific activity - `Insert`, `Update` or `Delete`

Here's an example of it's usage:
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
+       if (e.Activity == Activities.Update && this.OrderDate.WasChanged)
+       {
+           System.Diagnostics.Debug.WriteLine("Order Date was Changed from:" + OrderDate.OriginalValue + " to: " + OrderDate.Value);
+       }
+       base.OnSavingRow(e);
+   


