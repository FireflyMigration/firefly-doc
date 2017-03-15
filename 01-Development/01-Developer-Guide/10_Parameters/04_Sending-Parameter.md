* Add a button to the "ShowOrders" View and call it "Details"
* Add a `Click` handler to that button and in it call the new "ShowOrderDetails" Controller
```csdiff
private void button1_Click(object sender, ButtonClickEventArgs e)
{
+   new ShowOrderDetails().Run(_controller.Orders.OrderID);
}
```
* Run it and see that it works
<iframe width="560" height="315" src="https://www.youtube.com/embed/eUPRKLwVqdw?list=PL1DEQjXG2xnJxhcxZ1ItQdfroctirL8Qr" frameborder="0" allowfullscreen></iframe>

