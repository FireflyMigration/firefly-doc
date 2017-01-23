### Custom Commands
As oppose to internal events, Customs commands are events that the developer is responsible to create, raise and handle.

1. Create `CustomCommand` named “myCommand”.
```diff
public class ShowOrders : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public readonly Models.Shippers Shippers = new Models.Shippers();
        public DateColumn LastShippingDate = new DateColumn { Value = Date.Now.EndOfYear };
+       public CustomCommand myCommand = new CustomCommand();
```
2. Add handler that shows a message box:
```diff
public ShowOrders()
{
    From = Orders;
    Relations.Add(Shippers, RelationType.Find,Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.OrderDate.IsGreaterThan(1990,1,1));
    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

    Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
    AddAllColumns();
-   Handlers.Add(System.Windows.Forms.Keys.F7|System.Windows.Forms.Keys.Control).Invokes += ShowOrders_Invokes;
-   Handlers.Add(Command.GoToNextRow).Invokes += ShowOrders_NextRow;
+   Handlers.Add(myCommand).Invokes += myCommand_Invokes;
}
- void ShowOrders_NextRow(HandlerInvokeEventArgs e)
- {
-     e.Handled = true;
-     System.Windows.Forms.MessageBox.Show("You want to go to next row");
- }

- void ShowOrders_Invokes(HandlerInvokeEventArgs e)
- {
-     System.Windows.Forms.MessageBox.Show("You Pressed Ctrl+F7");
- }
+ void myCommand_Invokes(HandlerInvokeEventArgs e)
+ {
+     System.Windows.Forms.MessageBox.Show("My Command");
+ }
```
3. `Raise` the command in the **OnStart**
```diff 
protected override void OnStart()
{
    Raise(myCommand);
}
```
4. Build and Run
5. See below how to use `Raise` method of a new **button** "My Command".
```diff
+ private void btnMyCommand_Click(object sender, ButtonClickEventArgs e)
+ {
+     e.Raise(_controller.myCommand);
+ }
```
6. Build and Run
7. Notice the difference between `Raise` and `Invoke`.
```diff
protected override void OnStart()
{
    Raise(myCommand); //don't wait
+   Invoke(myCommand); //wait 
}
```
`Raise` – The event will wait and occur the next time the user is able to input value.
`Invoke` – The event will not wait and occur immediately.

8. To better understand the wait/ no wait concept, please add a message box once after the `Raise` command and once after the Invoke command and run.
```diff
protected override void OnStart()
{
    Raise(myCommand); //don't wait
+   System.Windows.Forms.MessageBox.Show("This is my command");
}
``` 

9. You will notice that with `Raise` the message appears before the message in the handler while with `Invoke` it appears after the message in the handler. 

10. To specify a condition for an event, add `BindEnabled`, as follows:

```diff
Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
AddAllColumns();
- Handlers.Add(myCommand).Invokes += myCommand_Invokes;
+ var myHandler = Handlers.Add(myCommand);
+ myHandler.Invokes += myCommand_Invokes;
+ myHandler.BindEnabled(() => Orders.ShipVia == 2);
```

11. Exercise: Custom Command

