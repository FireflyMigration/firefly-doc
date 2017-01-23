### BusinessProcess.Sum
As oppose to the previous example, you can see in this example that there is no need for an extra variable to sum the total as we use the `Sum()` method.
```diff
private void bpInsideAMethodToolStripMenuItem_Click(object sender, EventArgs e)
{
-   Number total = 0;
    var orders = new Models.Orders();
    var bp = new BusinessProcess { From = orders };
    bp.Where.Add(orders.ShipCity.IsEqualTo("London"));
-    bp.ForEachRow(() => total += orders.Freight);
            
-   MessageBox.Show("Total Freight : " + total);
+   MessageBox.Show("Total Freight : " + bp.Sum(orders.Freight));
}
```
### BusinessProcess.Get
In the `Get()` method, you need to provide the return value (1st parameter) based on a condition (2nd parameter)
```diff
public class ShowOrders : UIControllerBase
    {
+        internal Text GetShipperName()
+        {
+            var shippers = new Models.Shippers();
+            var bp = new BusinessProcess { From = shippers };
+            return bp.Get(shippers.CompanyName, shippers.ShipperID.IsEqualTo(Orders.ShipVia));
+        }
```

Exercise: BP.Sum and BP.Get