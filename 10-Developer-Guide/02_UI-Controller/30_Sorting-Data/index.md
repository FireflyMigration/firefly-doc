keywords:orderby,sort,order by

In this article we'll:
* Sort by Ship City
* Show how to make the sort descending

```csdiff
public ShowOrders()
{
     From = Orders;
     Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
           Orders.ShipCity.IsEqualTo("Madrid")));
     Where.Add(Orders.ShipName.IsDifferentFrom(""));

+    OrderBy.Add(Orders.ShipCity);
+    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

}
```
---

<iframe width="560" height="315" src="https://www.youtube.com/embed/lAtzSRwwJnE?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>