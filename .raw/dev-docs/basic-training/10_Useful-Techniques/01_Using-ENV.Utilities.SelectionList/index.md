### Using ENV.Utilities.SelectionList

1.	Since selection lists are very common and useful, we added a utility that makes the task of creating a selection list much easier.
2.	Let’s see how to use it. In "ShowOrders" Replace the calling to the previous selection list with the following:
```csdiff
internal void SelectShipper()
{
-    new SelectShipper().Run(Orders.ShipVia) ;
+    var shippers = new Models.Shippers();
+    ENV.Utilities.SelectionList.Show(Orders.ShipVia, shippers, shippers.ShipperID, shippers.CompanyName);
}
``` 
3.	Notice that although we already have Shippers table declared, we still need to create a new instance for the selection list.
4.	Build and run
