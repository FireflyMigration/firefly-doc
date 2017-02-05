# UIController - More about Relation

```csdiff
public ShowOrders()
{
    From = Orders;
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
        Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.ShipName.IsDifferentFrom(""));

    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

-    Relations.Add(Shippers, RelationType.Find, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
+    Relations.Add(Shippers, Shippers.ShipperID.IsEqualTo(Orders.ShipVia),Shippers.SortByPK_Shippers);
            
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/9ifSzrZNh4U?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>