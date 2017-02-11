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