### SubForm (Master-Detail)

1.	Sometimes we want to display 2 grids on the same screen. Usually these screens display a master list and the details for the currently selected item. This is known as a Master-Detail interface.
2.	To achieve a Master-Detail screen, we can use the SubForm control.
3.	In “ShowOrders” make room for a second grid.
4.	Drag a SubForm control to the screen and locate it nicely under the upper grid.
5.	Switch to the code view of the UI, and add the following lines in the constructor of the form, after the call to the InitializeComponent method.
```csdiff
public ShowOrdersView(ShowOrders controller)
{
    _controller = controller;
    InitializeComponent();

+   var orderDetails = new ShowOrderDetails();
+   subForm1.SetController(orderDetails, () => orderDetails.Run(_controller.Orders.OrderID));
}
```  
6.	As we mentioned earlier that ()=> is the C# syntax for “lambda expression”, which is a way to send a as an expression as a parameter.
7.	When using a SubForm, the Run method in the lower grid, is executed for each row we select on the upper grid. Notice that the Run method contains a `Where.Add` that adds a filter to the current filter. 
8.	In order to refresh the `Where` each time, add `Where.Clear()` before the `Where.Add`
```csdiff 
public void Run(Number orderId)
{

+   Where.Clear();
    Where.Add(OrderDetails.OrderID.BindEqualTo(orderId));
    Execute();
}
```
9.	Build and run.
10. Exercise: SubForm (Master-Detail)
