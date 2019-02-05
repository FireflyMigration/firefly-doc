# Using Date to Filter Data

*Using Dates in the Where statement*
```csdiff
public ShowOrders()
{
    From = Orders;
+   Where.Add(Orders.OrderDate.IsGreaterOrEqualTo(new Date(1997, 1, 1)));
}
```
*Using date in the Between statement*
```csdiff
Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1), new Date(1996, 12, 31)));
```
*An other example:*
```csdiff
var start = new Date(1996, 1, 1);
Where.Add(Orders.OrderDate.IsBetween(start,start.EndOfYear));
```


---

<iframe width="560" height="315" src="https://www.youtube.com/embed/B_Xqlz1Cy-U?list=PL1DEQjXG2xnJHBP-SfD7JIStsHcbhKV8r" frameborder="0" allowfullscreen></iframe>

