### BusinessProcess in a Method

1. Add a new menu entry in Application.MDI, Here is the Count Example called from the main menu:
```diff
private void bpInsideAMethodToolStripMenuItem_Click(object sender, EventArgs e)
{
+    Models.Orders orders = new Models.Orders();
+    BusinessProcess bp = new BusinessProcess();
+    bp.From = orders;
+    bp.Where.Add(orders.ShipCity.IsEqualTo("London"));
+    bp.Run();
+    MessageBox.Show("Number of rows : " + bp.Counter);
}
``` 
2.	From now on we will use Object Initializer and “var” to make it even shorter.
3.	Sum Example:
```diff
private void bpInsideAMethodToolStripMenuItem_Click(object sender, EventArgs e)
{
+   Number total = 0;
-   Models.Orders orders = new Models.Orders();
+   var orders = new Models.Orders();

-   BusinessProcess bp = new BusinessProcess();
+   var bp = new BusinessProcess {From = orders};

    bp.Where.Add(orders.ShipCity.IsEqualTo("London"));

+   bp.LeaveRow += () => total += orders.Freight;
    bp.Run();

-   MessageBox.Show("Number of rows : " + bp.Counter);
+   MessageBox.Show("Total Freight : " + total);
}
```
4.	Change the last example to use the `ForEachRow` method.
```diff
private void bpInsideAMethodToolStripMenuItem_Click(object sender, EventArgs e)
{
    Number total = 0;
    var orders = new Models.Orders();
    var bp = new BusinessProcess {From = orders};
    bp.Where.Add(orders.ShipCity.IsEqualTo("London"));
-   bp.LeaveRow += () => total += orders.Freight;
+   bp.ForEachRow (() => total += orders.Freight);

-   bp.Run();
    MessageBox.Show("Total Freight : " + total);
}
``` 
5.	Notice that no need to use the `Run()` method as it includes in `ForEachRow()` method.
6.	Another method that can be used is `ForFirstRow` method. This can be good for “get description” kind of methods.
7.	Exercise: BusinessProcess in a Method
