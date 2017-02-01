### Entity.Delete
1.	Now let's add another button to remove the Chai from the order:
```csdiff
+    private void btnDeleteChai_Click(object sender, ButtonClickEventArgs e)
+    {
+        var orderDetails = new Models.OrderDetails();
+        orderDetails.Delete(
+            orderDetails.OrderID.IsEqualTo(_controller.Orders.OrderID).And(orderDetails.ProductID.IsEqualTo(1)));
+        subForm1.ReloadData();
+                
+    }
```