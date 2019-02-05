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

You can also sort using an existing index from the table - the syntax is a bit different, you will need to choose  
from the existing entity's indexes (their names are prefixed with *SortBy*). For example:
```csdiff
public ShowOrders()
{
     From = Orders;
     Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
           Orders.ShipCity.IsEqualTo("Madrid")));
     Where.Add(Orders.ShipName.IsDifferentFrom(""));

-    OrderBy.Add(Orders.ShipCity);
+    OrderBy = Orders.SortByCustomerID;

}
```





---

<iframe width="560" height="315" src="https://www.youtube.com/embed/lAtzSRwwJnE?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>