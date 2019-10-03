In magic to handle a button click it was common to create a `CustomCommand` (User Action as it was called in magic)  and create a handler to handle that custom command.

In new code you can simply call a method from the button click
In the `Controller` use a Method instead of a `CustomCommand`
```csdiff

#region CustomCommands
internal readonly CustomCommand ExpandCust = new CustomCommand("Expand Cust");
-internal readonly CustomCommand Print = new CustomCommand("Print");
#endregion
...
void InitializeHandlers()
{
 ...
-   Handlers.Add(Print).Invokes += e => 
-   #region
-   {
-       // send range of this order
-       new Print_Order().Run(Orders.OrderID);
-       e.Handled = true;
-   };
-   #endregion
    
  ...
}

+public void PrintTheOrders()
+{
+   // send range of this order
+   new Print_Order().Run(Orders.OrderID);
+}
```

And in the `View` class instead of raising the `CustomCommand` just call the `PrintTheOrders` method
```csdiff
void btnPrint_Click(object sender, ButtonClickEventArgs e)
{
-   e.Raise(_controller.Print);
+   _controller.PrintTheOrders();
}
```

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/y3Kby6rdK9E" frameborder="0" allowfullscreen></iframe>