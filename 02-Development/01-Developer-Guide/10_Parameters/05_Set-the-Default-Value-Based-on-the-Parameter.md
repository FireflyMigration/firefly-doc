keywords: AllowFocus
* First we would like to prevent the user from changing the value of `OrderID` on our "ShowOrderDetails" view.
* To do that we'll select the TextBox bound to "OrderID" in the "ShowOrderDetails" view and change the `AllowFocus` property to false. It'll prevent the user from parking on this TextBox and changing it's value
* To set the value received as parameter for "OrderId" as the value for new rows in the "Order_Details" table, we'll set the "OrderID" column's `DefaultValue` property
```csdiff
public void Run(Number OrderId)
{
+   Order_Details.OrderID.DefaultValue = OrderId;
    Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Execute();
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/fyVqeQmFLCk?list=PL1DEQjXG2xnJxhcxZ1ItQdfroctirL8Qr" frameborder="0" allowfullscreen></iframe>