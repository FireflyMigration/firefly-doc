* Updating the Order
```csdiff
void DemoReadXml()
{
    var o = ReadXml(@"c:\temp\orders.xml");
+    var Orders = new Models.Orders();
+    Orders.InsertIfNotFound(Orders.OrderID.BindEqualTo(o.OrderID), ()=> {
+        Orders.CustomerID.Value = o.CustomerID;
+        Orders.ShipVia.Value = o.Shipper;
+    }); 
}
```

### Updating the Order Details
* We start by deleting the existing order details, as we expect the object we receive to include all products in the order
```csdiff
void DemoReadXml()
{
    var o = ReadXml(@"c:\temp\orders.xml");
    var Orders = new Models.Orders();
    Orders.InsertIfNotFound(Orders.OrderID.BindEqualTo(o.OrderID),()=> {
        Orders.CustomerID.Value = o.CustomerID;
        Orders.ShipVia.Value = o.Shipper;
    }); 
+   var Order_Details = new Models.Order_Details();
+   Order_Details.Delete(Order_Details.OrderID.IsEqualTo(o.OrderID));
+   foreach (var item in o.Details)
+   {
+       Order_Details.Insert(() => {
+           Order_Details.OrderID.Value = o.OrderID;
+           Order_Details.ProductID.Value = item.ProductID;
+           Order_Details.Quantity.Value = item.Quantity;
+           Order_Details.UnitPrice.Value = item.UnitPrice;
+       });
+   }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/oeCSxLEqmO0?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>