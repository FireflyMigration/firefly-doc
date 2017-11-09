
```csdiff
 class OrdersViewModel : ViewModelHelper
{
    public readonly Northwind.Models.Orders Orders = new Northwind.Models.Orders();

    public OrdersViewModel()
    {
        From = Orders;
        AllowUpdate = true;
+       Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(1997, 1, 1));

        MapColumn(Orders.OrderID,
            Orders.CustomerID,
            Orders.OrderDate,
            Orders.ShipVia);
        MapExperssion("ServerSideDayOfWeek", () => u.NDOW(u.DOW(Orders.OrderDate)));
    }
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/925b75842f60bdfcf7ab80efa8a9851f7dc508ac)

<iframe width="560" height="315" src="https://www.youtube.com/embed/5bhjKww1dcM?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
