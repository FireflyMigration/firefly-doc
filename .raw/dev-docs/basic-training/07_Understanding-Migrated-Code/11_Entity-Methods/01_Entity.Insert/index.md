### Entity.Insert
1.	Let's assume that we have a big stock of the Chai product and we want to sell it quickly. So we want to add a button to the ShowOrders screen that will add Chai to the current order. In magic, we had to create a BusinessProcess that looks like this:
```diff
public class AddChaiToOrder : BusinessProcessBase
{
+   public readonly Models.OrderDetails OrderDetails = new Models.OrderDetails();
+   Number _orderID;

    public AddChaiToOrder()
    {
        From = OrderDetails;
    }
-   public void Run()
+   public void Run(Number orderID)
    {
+       _orderID = orderID;
        Execute();
    }
+   protected override void OnLoad()
+   {
+       Exit(ExitTiming.AfterRow);
+       Activity = Activities.Insert;
+   }

+   protected override void OnLeaveRow()
+   {
+       OrderDetails.OrderID.Value = _orderID;
+       OrderDetails.ProductID.Value = 1;   //Chai is productId 1
+       OrderDetails.Quantity.Value = 1;
+   }
}
```
2. There is no need to create entire BusinessProcess just for adding a row to a table. Here is a better way to do this:
```diff
+ private void btnAddChai_Click(object sender, ButtonClickEventArgs e)
+ {
+    var orderDetails = new Models.OrderDetails();
+    orderDetails.Insert(() =>
+    {
+        orderDetails.OrderID.Value = _controller.Orders.OrderID;
+        orderDetails.ProductID.Value = 1;
+        orderDetails.Quantity.Value = 1;
+    });
+    subForm1.ReloadData(); 
+}
```