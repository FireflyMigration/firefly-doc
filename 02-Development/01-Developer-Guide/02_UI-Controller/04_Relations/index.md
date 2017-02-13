keywords:relation,link
# UIController - Relations

```csdiff
 public readonly Models.Orders Orders = new Models.Orders();
+public readonly Models.Shippers Shippers = new Models.Shippers();
 public ShowOrders()
 {
    From = Orders;
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
        Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.ShipName.IsDifferentFrom(""));

    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

+   Relations.Add(Shippers, RelationType.Find, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
 }
    
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/6X7M-PbloU4?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>