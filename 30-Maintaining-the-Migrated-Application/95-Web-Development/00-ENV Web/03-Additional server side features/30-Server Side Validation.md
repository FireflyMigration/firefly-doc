
```csdiff
class OrdersViewModel : ViewModelHelper
{
    public readonly Northwind.Models.Orders Orders = new Northwind.Models.Orders();
    public readonly Northwind.Models.Shippers Shippers = new Northwind.Models.Shippers();

    public OrdersViewModel()
    {
        From = Orders;

        Relations.Add(Shippers, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));

        AllowUpdate = true;
        Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(1997, 1, 1));
        Shippers.CompanyName.Caption = "Shipper Name";
        MapColumn(Orders.OrderID,
            Orders.CustomerID,
            Orders.OrderDate,
            Orders.ShipVia,
            Shippers.CompanyName);
        MapExperssion("ServerSideDayOfWeek", () => u.NDOW(u.DOW(Orders.OrderDate)));
    }
+   protected override void OnSavingRow()
+   {
+       if (Orders.OrderDate.Year < 1995)
+           Message.ShowError("Please enter valid date");
+   }
}
```
[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/0a5daa27e9ec5c6fd2a97c53f0d336dde686b33c)

### Server side validation using ModelState
```csdiff
protected override void OnSavingRow()
{
-   if (Orders.OrderDate.Year < 1995)
-       Message.ShowError("Please enter valid date");
+   ModelState.AddError(Orders.OrderDate, "invalid date");


    ModelState.Required(Orders.OrderID);
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/6bc10abf9604dbdca7f88e424a55a13a33af8de2)


<iframe width="560" height="315" src="https://www.youtube.com/embed/qCyGlMEyNLU?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
