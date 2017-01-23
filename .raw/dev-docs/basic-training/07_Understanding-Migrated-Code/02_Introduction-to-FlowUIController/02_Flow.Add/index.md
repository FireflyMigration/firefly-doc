### Flow.Add

1.	The Flow property of the FlowUIController class allows us to put logic code between columns of the columns collections.
 The `Flow.Add` method accepts an “Action” that will be executed as the user navigates (flows) between the columns on the screen. The `Flow.Add` method has many overloads that allow you to specify the conditions in which the action should be executed, as explained next.
Using the `Flow.Add` method, add a message box between the columns, as follows:
```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.ShipVia);
+   Flow.Add(() => MessageBox.Show("My Flow"));
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}

```
Run the program and show that the message is displayed on both direction and when the user navigates between the columns using the Tab key or the mouse.
Add another message box between the columns without using the `Flow.Add` method and notice that it’s displayed before the program is executed. 
```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.ShipVia);
    Flow.Add(() => MessageBox.Show("My Flow"));
+   MessageBox.Show("No Flow.Add here");
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}

```

Comment out the message without the “Flow.Add”.

Exercise: Flow.Add

**Why do I need the `Flow.Add` method? What happens if we put the logic code between columns without using the `Flow.Add` method?**
Any code between the columns is executed once the program is constructed, as it is in the constructor of the class. Thus, any logic code in the constructor is executed before the task is executed and before the UI of the program is displayed. The Flow property of the FlowUIController allows us the save actions for later (This is why we use lambda expression). The Flow is responsible for executing the action at the correct timing, according to the user navigation on the screen.

#### 1. Condition

1.	Add condition, so that the message will be displayed only when the “ShipName” is empty. Change the message to “Please enter a ship name”.

```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.ShipVia);
-   Flow.Add(() => MessageBox.Show("My Flow"));
+   Flow.Add(() => MessageBox.Show("Please enter a ship name"), ()=> Orders.ShipName=="");
-   MessageBox.Show("No Flow.Add here");
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}
```

2. Run the program and demo the condition in action.

Exercise: Flow.Add Condition

#### 2. Direction
1.	Change the code of the previous message to be forward only.

```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.ShipVia);
-    Flow.Add(() => MessageBox.Show("Please enter a ship name"), ()=> Orders.ShipName=="");
+    Flow.Add(() => MessageBox.Show("Please enter a ship name"), 
+                                  ()=> Orders.ShipName=="",
+                                  Firefly.Box.Flow.Direction.Forward);
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}
```
2.	Run the program and show that the message appears only when navigating forward.
3.	Exercise: Flow Direction 

### 3. FlowMode

* #### Tab or Skip
  
1.	Change the code, so that the message will be displayed only when the user navigates using the Tab key.
```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.ShipVia);
    Flow.Add(() => MessageBox.Show("Please enter a ship name"), 
                                    ()=> Orders.ShipName=="",
-                                    Firefly.Box.Flow.Direction.Forward);
+                                    Firefly.Box.Flow.FlowMode.Tab);
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}
```  
2.	Run the program and demo the FlowMode in action.
3.	Exercise: FlowMode 

* #### Expand before/after
  
1.	Using the `Flow.Add` method and the `ExpandBefore` flow mode, add a selection list to the , as follows:
```diff
public FlowOrders()
{
    From = Orders;
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.OrderDate);
+   Flow.Add(() => new SelectShipper().Run(Orders.ShipVia), Firefly.Box.Flow.FlowMode.ExpandBefore);
    Columns.Add(Orders.ShipVia);
    Flow.Add(() => MessageBox.Show("Please enter a ship name"), 
                                    ()=> Orders.ShipName=="",
                                    Firefly.Box.Flow.FlowMode.Tab);
    Columns.Add(Orders.ShipName);
    Columns.Add(Orders.ShipCity);
}
```

2. Notice the difference between `ExpandBefore` and `ExpandAfter`. For more info refer to the documentation:
* `ExpandBefore` – When the user parks on the next column (after the `Flow.Add` in the code) and invokes the “Expand” event, the event will be triggered and the user will stay on the same column.
* `ExpandAfter` - When the user parks on the previous column (before the `Flow.Add` in the code) and invokes the “Expand” event, the event will be triggered and the user will skip to the next column.
3. Exercise: ExpandBefore and ExpandAfter

Note that most of the `Flow.Add` overloads are combinations of condition, direction and flow mode parameters. Other overloads that accept cachedTask will be discussed later on, when we will learn about cached task.
