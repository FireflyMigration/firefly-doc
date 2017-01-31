### Internal Commands

1.	Internal Commands are build-in events such as, "Exit" or "Select", which the developer can either handle or raise.
2.	Add a handler for the `GoToNextRow` command, as follows:
```csdiff
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
    Handlers.Add(System.Windows.Forms.Keys.F7|System.Windows.Forms.Keys.Control).Invokes += ShowOrders_Invokes;
 +  Handlers.Add(Command.GoToNextRow).Invokes += ShowOrders_NextRow;

}

+ void ShowOrders_NextRow(HandlerInvokeEventArgs e)
+ {
+     System.Windows.Forms.MessageBox.Show("You want to go to next row");
+ }
```
3.	Run the program and notice that a message is displayed when moving to the next row.
4.	Change the event `Handled` to be `true`, as follows:
```csdiff
void ShowOrders_NextRow(HandlerInvokeEventArgs e)
{
+   e.Handled = true;
    System.Windows.Forms.MessageBox.Show("You want to go to next row");
}
```
5.	Run the program and notice that you can’t go to the next row.
6.	The `e.Handled = true` marks the event as handled, which prevents other handlers along the event route from handling the same event again. (Similar to Prop=NO in Magic)
***Note*** : In case of Internal commands, if you choose to indicate that `Handled = True`,
the handling of this event will be limited to the current task, not reaching the engine.
In this case, for example, it will not move to the next row !
7.	Exercise: Internal Command
