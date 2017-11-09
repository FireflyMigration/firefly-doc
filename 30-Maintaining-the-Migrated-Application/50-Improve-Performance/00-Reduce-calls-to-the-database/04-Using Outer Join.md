Use Join when you have a relation that is unique (returns only one row), and that returns mostly different rows when it's used.

In our case, the relation from Order Details to Orders, returns only one row from Orders (Since order id is unique in Orders) and since there are only a few lines in Order Details for each orders we'll get many different orders when using this relation.



```csdiff
-Relations.Add(Orders, Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);

+Relations.Add(Orders, RelationType.OuterJoin, Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/RT9KreyNRYg?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>