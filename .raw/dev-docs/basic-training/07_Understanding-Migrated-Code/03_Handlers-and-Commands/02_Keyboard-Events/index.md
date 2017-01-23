### Keyboard Events
1.	Every press on the keyboard is an event that can be handled inside the code. Add handler for the F8 key in "ShowOrders" Constructor, as follows: 
```diff
    Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
    AddAllColumns();
+    Handlers.Add(System.Windows.Forms.Keys.F8).Invokes += ShowOrders_Invokes;
}

+ void ShowOrders_Invokes(HandlerInvokeEventArgs e)
+ {
+     System.Windows.Forms.MessageBox.Show("You Pressed F8");
+ }

```

2. Run and notice that the handler works when you press F8 also in the sub form.
Change the **scope** of the event to `CurrentTaskOnly` as follows:
```diff
    Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
    AddAllColumns();
-   Handlers.Add(System.Windows.Forms.Keys.F8).Invokes += ShowOrders_Invokes;
+   Handlers.Add(System.Windows.Forms.Keys.F7,HandlerScope.CurrentTaskOnly).Invokes += ShowOrders_Invokes;

}

void ShowOrders_Invokes(HandlerInvokeEventArgs e)
{
-    System.Windows.Forms.MessageBox.Show("You Pressed F8");
+    System.Windows.Forms.MessageBox.Show("You Pressed F7");
}
```
3. Run and see that now it’s not working in the sub task.
In some cases we want to handle a combination of two keyboard keys such as CTRL+F7. To do that we use a pipeline separator between the keys as follows. 
```diff
    AddAllColumns();
-   Handlers.Add(System.Windows.Forms.Keys.F7,HandlerScope.CurrentTaskOnly).Invokes += ShowOrders_Invokes;
+   Handlers.Add(System.Windows.Forms.Keys.F7|System.Windows.Forms.Keys.Control).Invokes += ShowOrders_Invokes;

}

void ShowOrders_Invokes(HandlerInvokeEventArgs e)
{
-   System.Windows.Forms.MessageBox.Show("You Pressed F7");
+   System.Windows.Forms.MessageBox.Show("You Pressed Ctrl+F7");
}
```

4.  Exercise: Keyboard Events

