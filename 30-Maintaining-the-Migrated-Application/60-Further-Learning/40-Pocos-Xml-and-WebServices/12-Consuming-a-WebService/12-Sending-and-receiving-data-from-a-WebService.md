
* Create a `PrintOrderToDebug` method to write the order to the Output Window

```csdiff
private static void PrintOrderToDebug(OrderService.OrderPoco o)
{
    Debug.WriteLine(o.OrderID + " Customer: " + o.CustomerID);
    foreach (var item in o.Details)
    {
        Debug.WriteLine("Product:" + item.ProductID + " Quantity:" + item.Quantity);
    }
}
```
* Get the order from the WebService and print it
```csdiff
private static void DemoReadingAndWritingToWebServer()
{
    var c = new OrderService.OrderServiceClient();
    var o = c.GetOrder(10249);
+   PrintOrderToDebug(o);
}
```

### Update the order object and send it back to the web service
* On lines 6-9 we update the Order we just got from the WebService
* On line 10, we send the updated Order to the WebService
* On line 12, we request that Order from the web service
* On line 13, we print that order and see that the changes were saved
```csdiff
private static void DemoReadingAndWritingToWebServer()
{
    var c = new OrderService.OrderServiceClient();
    var o = c.GetOrder(10249);
    PrintOrderToDebug(o);
+   foreach (var item in o.Details)
+   {
+       item.Quantity++;
+   }
+   c.InsertOrUpdateOrder(o);
+
+   var y = c.GetOrder(10249);
+   PrintOrderToDebug(y);
}
```




<iframe width="560" height="315" src="https://www.youtube.com/embed/4u0-cBMjyF8?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>