### in the ShowOrderDetails Controller
```csdiff
-public void Run(Number orderId,bool exitImmediately)
+public void Run(Number orderId)
{
-   Exit(ExitTiming.BeforeRow, () => exitImmediately);
    Where.Clear();
    Where.Add(Order_Details.OrderID.BindEqualTo(orderId));
    Execute();
}

protected override void OnLoad()
{
+   Exit(ExitTiming.BeforeRow, () => u.Level(1) == "RP");
    KeepViewVisibleAfterExit = true;
    View = () => new Views.ShowOrderDetailsView(this);
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/fPW2AwsACTw?list=PL1DEQjXG2xnKZADlPXY_P61ujx3lGsP6m" frameborder="0" allowfullscreen></iframe>