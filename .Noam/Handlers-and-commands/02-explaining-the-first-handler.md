```csdiff
 public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;

+       Handlers.Add(System.Windows.Forms.Keys.F8).Invokes += e =>
+       {
+           Message.ShowWarning("Pressed F8");
+       };
    }
```