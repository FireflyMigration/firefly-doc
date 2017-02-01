## Filter with Dates
1.	Let’s see how to filter the orders and display only the orders of 1996:
```csdiff
public ShowOrders()
{
    From = Orders;
+    Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1), new Date(1996, 12, 31)));
}
```
2.	Exercise: Filter with Dates