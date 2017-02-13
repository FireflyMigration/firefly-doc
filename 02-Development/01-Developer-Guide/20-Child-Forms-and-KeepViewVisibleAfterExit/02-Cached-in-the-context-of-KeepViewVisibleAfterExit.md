# Cached in the context of KeepViewVisibleAfterExit

### in ShowOrdersView
```csdiff
private void button1_Click(object sender, ButtonClickEventArgs e)
{
    _controller.RunOrderDetails();
}
```

### in ShowOrders controller
```csdiff
internal void RunOrderDetails()
{
-    new ShowOrderDetails().Run(Orders.OrderID);
+   Cached<ShowOrderDetails>().Run(Orders.OrderID);
}
```
### in ShowOrdersDetails controller
```csdiff
public void Run(Number orderId)
{
+   Where.Clear();
    Where.Add(Order_Details.OrderID.BindEqualTo(orderId));
    Execute();
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/z6Bd-uZM5tk?list=PL1DEQjXG2xnKZADlPXY_P61ujx3lGsP6m" frameborder="0" allowfullscreen></iframe>