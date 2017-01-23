### Entity.Contains

1.	It is a good idea to check if the order already contains Chai and add it only if not.
2.	We can use the Contains method of the entity as follows:
```diff        
private void btnAddChai_Click(object sender, ButtonClickEventArgs e)
{
    var orderDetails = new Models.OrderDetails();
+    if (!orderDetails.Contains(orderDetails.OrderID.IsEqualTo(_controller.Orders.OrderID).And(orderDetails.ProductID.IsEqualTo(1))))
+    {
        orderDetails.Insert(() =>
        {
            orderDetails.OrderID.Value = _controller.Orders.OrderID;
            orderDetails.ProductID.Value = 1;
            orderDetails.Quantity.Value = 1;
        });
        subForm1.ReloadData(); 
+    }
}
```