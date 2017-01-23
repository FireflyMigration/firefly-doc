### Introduction to FlowUIController
A FlowUIController is a second type of a UIController that is backward compatible with online tasks that was created in Magic 9 or earlier. 
There are two main differences between the UIController we have learned and the `FlowUIController`:
    a. **Tab Order** – a `FlowUIController` controls the tab order on the screen. 
    b. **The Flow property** – Allows adding logic code between columns.

Under "Training" folder, Add a new UIController named "FlowOrders" and change it to `FlowUIController` as follows:
```diff
- public class FlowOrders : UIControllerBase
+ public class FlowOrders : FlowUIControllerBase
    {
+        public readonly Models.Orders Orders = new Models.Orders();

        public FlowOrders()
        {
+            From = Orders;
+            Columns.Add(Orders.OrderID);
+            Columns.Add(Orders.OrderDate);
+            Columns.Add(Orders.ShipVia);
+            Columns.Add(Orders.ShipName);
+            Columns.Add(Orders.ShipCity);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.FlowOrdersView(this);
        }
    }
```
**Where is the FlowUIController template?**

There is no item template for `FlowUIController`, as it is recommended to use the `UIController` template for future development. However, changing a UIController to `FlowUIController` is easy as changing the base class from `UIControllerBase` to `FlowUIControllerBase`. 

**Note**: If you really need a template for a `FlowUIController`, it’s very easy to create one, based on the template of a UIController.



