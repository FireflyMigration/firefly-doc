We would like to display Some statistical information for each order.
* In the `ShowOrders` Controller we'll add some local columns, and place them no the `View` below the grid:
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Shippers Shippers = new Models.Shippers();

+   public readonly NumberColumn Items = new NumberColumn("Items","2");
+   public readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity","4");
+   public readonly NumberColumn TotalAmount = new NumberColumn("Total Amount","5C");
    public ShowOrders()
    {
        From = Orders;
        ...
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/ONZR8XF9eWo?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>

