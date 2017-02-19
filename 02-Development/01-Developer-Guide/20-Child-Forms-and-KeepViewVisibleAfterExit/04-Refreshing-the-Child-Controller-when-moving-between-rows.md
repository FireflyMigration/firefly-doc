### In ShowOrderDetails Controller
```csdiff
-public void Run(Number orderId)
+public void Run(Number orderId,bool exitImmediately)
{
+    Exit(ExitTiming.BeforeRow, () => exitImmediately);
    Where.Clear();
    Where.Add(Order_Details.OrderID.BindEqualTo(orderId));
    Execute();
}
```

### In ShowOrders Controller
```csdiff
+protected override void OnEnterRow()
+{
+   Cached<ShowOrderDetails>().Run(Orders.OrderID,true);
+}

internal void RunOrderDetails()
{
-   Cached<ShowOrderDetails>().Run(Orders.OrderID);
+   Cached<ShowOrderDetails>().Run(Orders.OrderID,false);
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/3Sb88aYW-dA?list=PL1DEQjXG2xnKZADlPXY_P61ujx3lGsP6m" frameborder="0" allowfullscreen></iframe>