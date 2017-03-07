* Add a parameter to the `Run` method of type `Number` called "OrderId" and filter according to it:
```csdiff
+public void Run(Number OrderId)
{
+   Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Debug.WriteLine("Before the Execute");
    Execute();
    Debug.WriteLine("After the Execute");
}
```
* Run the controller, using the "Controllers" developer tool
* Note that now it asks for an 'OrderId' to use as a parameter to the 'GetOrderStatistics' BusinessProcess
* Review the Life-Cycle using the output window, for a specific order
* Note that the 'OnSavingRow' event doesn't get executed, since we didn't make any change to any row.
* Remove all the Life-Cycle related code, to get a simple Business Process
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
}
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/7GhNi_2FFsM?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>

