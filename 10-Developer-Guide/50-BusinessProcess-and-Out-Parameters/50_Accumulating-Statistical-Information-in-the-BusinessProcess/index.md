* Add several members at the class level, to collect the statistical information we want
```csdiff
public class GetOrderStatistics : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();

    public GetOrderStatistics()
    {
        From = Order_Details;
    }
    public void Run(Number OrderId)
    {
        Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
        Execute();
    }
+   Number _count = 0;
+   Number _quantity = 0;
+   Number _totalAmount = 0;
}
```
* Note that we prefix their name with an "_" (underscore), that is the standard naming convention we use for `private` members
* Add an override to the `OnLeaveRow` method
```csdiff
Number _count = 0;
Number _quantity = 0;
Number _totalAmount = 0;
+protected override void OnLeaveRow()
+{
+}
```
* Add the code which collects our statistics in the OnLeaveRow method that gets executed for each row
```csdiff
Number _count = 0;
Number _quantity = 0;
Number _totalAmount = 0;
protected override void OnLeaveRow()
{
+   _count++;
+   _quantity += Order_Details.Quantity;
+   _totalAmount += Order_Details.Quantity * Order_Details.UnitPrice;
}
``` 
* Add a "Break Point" in the `OnLeaveRow` method and review the values of _count, _quantity and _totalAmount in the "watch" window
<iframe width="560" height="315" src="https://www.youtube.com/embed/2zXre8oWQco?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>

