* On line 4-8 we create a new Order, using the OrderPoco that was automatically generated based on the WebService we use.
* On line 10, we create a List of type OrderDetailsPoco, to which we'll add the individual `OrderDetailsPoco` objects
* On line 11-16, we create the First `OrderDetailsPoco` object and add it to the `items` list.
* On line 17-22, we create the second `ORderDetailsPoco` and add it to the `items` list
* On line 23, we convert the list to an array using the `ToArray` method, and set the `Details` property of the `OrderPoco` object with that array.
* On line 24, we send the OrderPoco to the WebService
* On line 25, we request the Order back from the WebService
* On line 26, we print the Order to verify that it was saved correctly

```csdiff
public void Run()
{
    var c = new OrderService.OrderServiceClient();
+   var o = new OrderService.OrderPoco
+   {
+       OrderID = 20000,
+       CustomerID = "NOAM"
+   };
+
+   var items = new List<OrderService.OrderDetailsPoco>();
+   items.Add(new OrderService.OrderDetailsPoco
+   {
+       ProductID = 1,
+       Quantity = 1,
+       UnitPrice = 10
+   });
+   items.Add(new OrderService.OrderDetailsPoco
+   {
+       ProductID = 2,
+       Quantity = 4,
+       UnitPrice = 15
+   });
+   o.Details = items.ToArray();
+   c.InsertOrUpdateOrder(o);
+   var y = c.GetOrder(20000);
+   PrintOrderToDebug(y);

}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/nAjJfCctpXU?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>