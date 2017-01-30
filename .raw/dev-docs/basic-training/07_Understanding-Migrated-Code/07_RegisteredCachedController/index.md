### RegisteredCachedController
1.	Continuing the same example, notice that the `ShowOrderDetailsChild` screen exits immediately upon executing:
``` diff
protected override void OnLoad()
{
+   Exit();
    KeepViewVisibleAfterExit = true;
    View = () => new Views.ShowOrderDetailsChildView(this);
}
```
2.	As a result, there is no way to go to the `ShowOrderDetailsChild` screen.
3.	One way to fix it is to add a keyboard event, so that when clicking F8 (for example) the `ShowOrderDetailsChild` will be executed again, but this time without exit immediately.
  * First, we need a way to tell the `ShowOrderDetailsChild` when it should exit immediately and when it should not. Sending another parameter to the controller sounds like a good idea.
  * To do this, let’s move the call to the `Exit` method be inside the `Run` method, and use another parameter as the exit condition.
```csdiff
- public void Run(Number orderId)
+ public void Run(Number orderId, bool shouldExit)
{
+   Exit(ExitTiming.BeforeRow, () => shouldExit);
    Where.Clear();
    Where.Add(OrderDetails.OrderID.IsEqualTo(orderId));
    Execute();
}
protected override void OnLoad()
{
-    Exit();
    KeepViewVisibleAfterExit = true;
    View = () => new Views.ShowOrderDetailsChildView(this);
}
```
   * Now, go back to `ShowOrdersParent` and send a value for the new parameter (or the build will fail). When calling ShowOrderDetailsChild from the `OnEnterRow` method of `ShowOrdersParent`, we still want it to exit immediately so let’s send 
```csdiff
protected override void OnEnterRow()
{
-    Cached<ShowOrderDetailsChild>().Run(Orders.OrderID);
+    Cached<ShowOrderDetailsChild>().Run(Orders.OrderID,true);
}
```

  * Let’s build and make sure it works.
  * Now, let’s add an event handler for the F8 key in `ShowOrdersParent` and call the program:
```csdiff
public ShowOrdersParent()
{
    From = Orders;
+   var h = Handlers.Add(System.Windows.Forms.Keys.F8);
+   h.Invokes += h_Invokes;
}

+ private void h_Invokes(HandlerInvokeEventArgs e)
+ {
+    Cached<ShowOrderDetailsChild>().Run(Orders.OrderID, false);
+ }
```
  * Run the program and notice that when pressing F8 the focus is on the right screen (ShowOrderDetailsChild).
4.	Assuming that we want to allow the user the click on the screen to activate it, we need to add the following code:

```csdiff
public ShowOrdersParent()
{
    From = Orders;
    var h = Handlers.Add(System.Windows.Forms.Keys.F8);
    h.Invokes += h_Invokes;
+   h.RegisterCached<ShowOrderDetailsChild>();
}
```
5.	Build and notice that when clicking on the right screen we go there.
6.	The last part can also be done without the need of the keyboard event just by adding the following code to the `OnLoad` method of the `ShowOrdersParent` controller:
```csdiff
protected override void OnLoad()
{
+   RegisterCachedController<ShowOrderDetailsChild>(c => c.Run(Orders.OrderID, false));
    View = () => new Views.ShowOrdersParentView(this);
}
```
7.	Build and notice that you can click on the right screen to go there.
8.	Exercise: RegisterCachedController
