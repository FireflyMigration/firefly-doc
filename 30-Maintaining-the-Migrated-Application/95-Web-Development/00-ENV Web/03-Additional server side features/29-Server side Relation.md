keywords:controlling column name in dataApi
```csdiff
class OrdersViewModel : ViewModelHelper
{
    public readonly Northwind.Models.Orders Orders = new Northwind.Models.Orders();
+   public readonly Northwind.Models.Shippers Shippers = new Northwind.Models.Shippers();

    public OrdersViewModel()
    {
        From = Orders;

+       Relations.Add(Shippers, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));

        AllowUpdate = true;
        Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(1997, 1, 1));

        Shippers.CompanyName.Caption = "Shipper Name";
        MapColumn(Orders.OrderID,
            Orders.CustomerID,
            Orders.OrderDate,
            Orders.ShipVia,
+           Shippers.CompanyName);
        MapExperssion("ServerSideDayOfWeek", () => u.NDOW(u.DOW(Orders.OrderDate)));
    }
}
```

### Controlling a column caption and name
```csdiff
AllowUpdate = true;
Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(1997, 1, 1));

+Shippers.CompanyName.Caption = "Shipper Name";
MapColumn(Orders.OrderID,
    Orders.CustomerID,
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/44c486c841c2c22335f1d62798e28de574b4a77a)

<iframe width="560" height="315" src="https://www.youtube.com/embed/XOxVW3ZzQh8?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
