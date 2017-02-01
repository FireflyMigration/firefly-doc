### BusinessProcess Inner Class
1.	Notice that a sub task in Magic is converted to an inner class in .NET (UIController or BusinessProcess).
2.	Let’s change the previous example to be an inner class:

```csdiff

public class ShowCalcOrder : UIControllerBase
    {

        public Models.Orders Orders = new Models.Orders();
        public NumberColumn TotalValue = new NumberColumn();

        public ShowCalcOrder()
        {
            From = Orders;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCalcOrderView(this);
        }

        protected override void OnEnterRow()
        {
-            Cached<CalculateOrderTotal>().Run(Orders.OrderID, TotalValue);
+            Cached<CalculateOrderTotal>().Run();
        }

+        public class CalculateOrderTotal : BusinessProcessBase
+        {

+            public readonly Models.OrderDetails OrderDetails = new Models.OrderDetails();
++            ShowCalcOrder _parent ;

++            public CalculateOrderTotal(ShowCalcOrder parent)
+            {
++                _parent = parent;
+                From = OrderDetails;
            }
++            public void Run()
+            {

-                _total = total;
+                Where.Clear();
++                Where.Add(OrderDetails.OrderID.IsEqualTo(_parent.Orders.OrderID));
+                Execute();
+            }

+            protected override void OnStart()
+            {
++                _parent.TotalValue.Value = 0;
+            }

+            protected override void OnLeaveRow()
+            {
++               _parent.TotalValue.Value += OrderDetails.Quantity * OrderDetails.UnitPrice - OrderDetails.Discount;
+            }
+        }
+ }

```
3.	In this case, we need to provide a reference of the parent controller to the inner class, in order to be able to update the value of the “TotalValue” column.
4.	Note that we don’t always need a parent reference, only when we should access the parent’s variables / methods.
5.	Run the program.
6.	Exercise: BusinessProcess Inner Class

