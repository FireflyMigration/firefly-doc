
```csdiff
void InitializeDataView()
    {
        From = Orders;

-       Relations.Add(Order_Details, Order_Details.OrderID.IsEqualTo(Orders.OrderID), Order_Details.SortByPK_Order_Details);
-       Relations[Order_Details].NotifyRowWasFoundTo(V_HasOrderDetails);
+       Orders.Columns.Add(V_HasOrderDetails);
+       V_HasOrderDetails.Name = @"isnull((
+Select max(1)
+From dbo.[Order Details] 
+Where OrderID = Orders.OrderID
+),0)";

        OrderBy = Orders.SortByPK_Orders;
```

We then remove the Entity definition and it's usage in the Column collection since we no longer need it.
* In the Models Region
```csdiff
internal readonly Models.Orders Orders = new Models.Orders { ReadOnly = true };
-readonly Models.Order_Details Order_Details = new Models.Order_Details { ReadOnly = true };
```
* In the `InitializeDataView` method
```csdiff
Columns.Add(Orders.OrderDate);
Columns.Add(TotalQuantity);
-Columns.Add(Order_Details.OrderID);
-Columns.Add(Order_Details.ProductID);
           
Columns.Add(V_HasOrderDetails);
```




<iframe width="560" height="315" src="https://www.youtube.com/embed/KidtQuLn-jc?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>