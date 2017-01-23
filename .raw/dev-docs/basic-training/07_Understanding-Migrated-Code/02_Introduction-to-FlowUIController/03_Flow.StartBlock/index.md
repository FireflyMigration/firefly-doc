### Flow.StartBlock

Used as an `if` statement that was originally in the record main (or RM compatible).  This is different than an `if` statement that was originally in other parts of the program like record suffix. All other cases were migrated to regular `if` statements.  Using an `if` statement between columns without using the `Flow.StartBlock`, is executed in the constructor of the class which is before the execution of the task and before the UI is displayed.
1.	Example:
```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Flow.Add(() => new SelectShipper().Run(Orders.ShipVia), Firefly.Box.Flow.FlowMode.ExpandBefore);
    Columns.Add(Orders.ShipVia);
-    Flow.Add(() => MessageBox.Show("Please enter a ship name"), 
-                                    ()=> Orders.ShipName=="",
-                                    Firefly.Box.Flow.FlowMode.Tab);
+   Flow.StartBlock();
+   {
+       Flow.Add(() => MessageBox.Show("Test1"));
+       Flow.Add(() => MessageBox.Show("Test2"));
+   }
+   Flow.EndBlock();
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}
```
2. We put curly brackets in the migrated code, to emphasize the block structure in terms of indentation (like an `if` statement). 
3. Run the program.
4. Show the use of a condition in a block, as follows:
```diff
    Columns.Add(Orders.ShipVia);
-    Flow.StartBlock();
+    Flow.StartBlock(() => Orders.ShipVia == 2);
    
    {
        Flow.Add(() => MessageBox.Show("Test1"));
        Flow.Add(() => MessageBox.Show("Test2"));
    }
    Flow.EndBlock();
    Columns.Add(Orders.ShipName);
```
5. Explain `Flow.StartBlockElse` and the use of nested blocks.

6. Exercise: Flow Block
7. Exercise: FlowUIController Summary

