
```csdiff
class OrdersViewModel : ViewModelHelper
{
    public readonly Northwind.Models.Orders Orders = new Northwind.Models.Orders();

    public OrdersViewModel()
    {
        From = Orders;
        AllowUpdate = true;

        MapColumn(Orders.OrderID,
            Orders.CustomerID,
            Orders.OrderDate,
            Orders.ShipVia);
+       MapExperssion("ServerSideDayOfWeek", () => u.NDOW(u.DOW(Orders.OrderDate)));
    }
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/c766d8a1a831d0bc3af2753c6f2e41c41a2a2961)

<iframe width="560" height="315" src="https://www.youtube.com/embed/Pw0-7wcsiaQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
