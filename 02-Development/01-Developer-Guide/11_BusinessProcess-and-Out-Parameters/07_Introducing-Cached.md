* For every line in the ShowOrders controller, the following code gets executed:
```csdiff
protected override void OnEnterRow()
{
    new GetOrderStatistics().Run(Orders.OrderID, Items, TotalQuantity, TotalAmount);
}  
```
* this means that for every row
  * A new instance of the `GetOrderStatistics` class is created
  * The Constructor for the `GetOrderStatistics` class get's executed
  * The `Run` method of the `GetOrderStatistics` get's executed.
* This can be wasteful in some cases
* To avoid that, we can create the instance of the `GetOrderStatistics` class once, and run it multiple times.
### the long way 
```csdiff
+GetOrderStatistics _stats = new GetOrderStatistics();
protected override void OnEnterRow()
{
+   _stats.Run(Orders.OrderID, Items, TotalQuantity, TotalAmount);
}  
```
* By following this pattern:
  * The `GetOrderStatistics` class instance is created once.
  * The `GetOrderStatistics` constructor is executed once
  * Only the `Run` method get's executed for each row.
* Since this is such a common pattern, we decided to create a way of doing it in just one line, by using the `Cached` method
### the short way, using Cached
```csdiff
protected override void OnEnterRow()
{
+   Cached<GetOrderStatistics>().Run(Orders.OrderID, Items, TotalQuantity, TotalAmount);
}  
```
* The `Cached` method, creates an instance of the `GetOrderStatistics` only when it's used for the first time, and then simply returns the same instance, so that we can run it again and again.
* Review in the output window, that the `Constructor` get's executed once, while the `Run` method get's executed for each row.
* Note - now we have a bug, since the values of Items, Total Quantity and Total Amount don't change for each row - we'll fix that in the next step

<iframe width="560" height="315" src="https://www.youtube.com/embed/3qyrFYnfB4E?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>

