Here we will see how to call the GetOrdersStatistics business process form the ShowOrders UI controller
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Shippers Shippers = new Models.Shippers();

    public readonly NumberColumn Items = new NumberColumn("Items","2");
    public readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity","4");
    public readonly NumberColumn TotalAmount = new NumberColumn("Total Amount","5C");
    public ShowOrders()
    {
        From = Orders;
        ...
    }
    ...
    protected override void OnEnterRow()
    {
+       new GetOrderStatistics().Run(Orders.OrderID, Items, TotalQuantity, TotalAmount);
    }     
    ...
```
* Run the "ShowOrders" controller, and see that we get the results for each order
* 


<iframe width="560" height="315" src="https://www.youtube.com/embed/WqOqEi6LQGw?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>

