`ViewModels\OrdersViewModel.cs`
```csdiff
class OrdersViewModel : ViewModel
{
    Northwind.Models.Orders Orders = new Northwind.Models.Orders();
    public OrdersViewModel()
    {
        From = Orders;
        AllowUpdate = true;
        AllowInsert = true;
        AllowDelete = true;
    }
+   protected override void OnSavingRow()
+   {
+       if (Activity == Activities.Insert)
+           Orders.OrderID.Value = Orders.Max(Orders.OrderID) + 1;
+   }
}
```

That's it for the server code, now let's allow insert and delete on the grid.
`Scripts\App\Orders.ts`
```csdiff
export class Orders {
    customers = new models.customers();
    orders = new models.orders(
        {
            numOfColumnsInGrid: 4,
            allowUpdate: true,
+           allowInsert: true,
+           allowDelete: true,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
...
```

Let's see that it works:
![2017 10 15 08H24 11](2017-10-15_08h24_11.gif)

