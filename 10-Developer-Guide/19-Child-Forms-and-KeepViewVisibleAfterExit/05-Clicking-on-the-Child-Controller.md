Keywords:RegisterCachedController

### in the ShowOrders Controller
```csdiff
public class ShowOrders : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;

+       RegisterCachedController<ShowOrderDetails>(RunOrderDetails);
    }
...
    internal void RunOrderDetails()
    {
        Cached<ShowOrderDetails>().Run(Orders.OrderID);
    }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/dMemEF0K1Ek?list=PL1DEQjXG2xnKZADlPXY_P61ujx3lGsP6m" frameborder="0" allowfullscreen></iframe>