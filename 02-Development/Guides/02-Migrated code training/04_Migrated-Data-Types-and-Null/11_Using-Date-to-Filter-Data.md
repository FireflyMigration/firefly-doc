# Using Date to Filter Data

*Using Dates in the Where statement*
```csdiff
public ShowOrders()
{
    From = Orders;
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
        Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.ShipName.IsDifferentFrom(""));

+    Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(1996, 1, 1).And(Orders.OrderDate.IsLessOrEqualTo(1996,12,31)));

    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

    Relations.Add(Shippers, Shippers.ShipperID.IsEqualTo(Orders.ShipVia),Shippers.SortByPK_Shippers);
}
```
*Using date in the Between statement*
```csdiff
Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1),new Date(1996,12,31)));
```
*An other example:*
```csdiff
var start = new Date(1996, 1, 1);
Where.Add(Orders.OrderDate.IsBetween(start,start.EndOfYear));
```


---

<iframe width="560" height="315" src="https://www.youtube.com/embed/B_Xqlz1Cy-U?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>

