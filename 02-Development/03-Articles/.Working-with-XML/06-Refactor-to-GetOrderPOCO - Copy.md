Getting the data from the Orders table

```csdiff
private void DemoWriteXml()
{
    var o = new OrderPoco();

+   var Orders = new Models.Orders();
+   Orders.ForEachRow(Orders.OrderID.IsEqualTo(10249), () =>
+   {
+       o.OrderID = Orders.OrderID;
+       o.CustomerID = Orders.CustomerID.TrimEnd();
+       o.Shipper = Orders.ShipVia;
+   });

    SaveXml(o, @"c:\temp\orders.xml");
}
```
Adding the data from Order_Details to the OrderPoco
```csdiff
private void DemoWriteXml()
{
    var o = new OrderPoco();

    var Orders = new Models.Orders();
    Orders.ForEachRow(Orders.OrderID.IsEqualTo(10249), () =>
    {
        o.OrderID = Orders.OrderID;
        o.CustomerID = Orders.CustomerID.TrimEnd();
        o.Shipper = Orders.ShipVia;
    });

+   var Order_Details = new Models.Order_Details();
+   Order_Details.ForEachRow(Order_Details.OrderID.IsEqualTo(10249), () =>
+   {
+       o.Details.Add(new OrderDetailsPoco {
+           ProductID = Order_Details.ProductID,
+           Quantity = Order_Details.Quantity,
+           UnitPrice = Order_Details.UnitPrice
+       });
+   });
    SaveXml(o, @"c:\temp\orders.xml");
}
```