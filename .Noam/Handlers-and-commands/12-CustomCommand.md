```csdiff
public class ShowOrders : UIControllerBase
{
+   public readonly CustomCommand ShowOrderDetailsCommand = new CustomCommand();

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;

        InitializeHandlers();
    }

    void InitializeHandlers()
    {
+       Handlers.Add(ShowOrderDetailsCommand).Invokes += e =>
+       {
+           new ShowOrderDetails().Run(Orders.OrderID);
+       };
    }
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/SX7Z7LV35ps?list=PL1DEQjXG2xnIGbO3DlvFQjv-T0OXM81r-" frameborder="0" allowfullscreen></iframe>