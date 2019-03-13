keywords:master detail
### in the ShowOrders Controller
```csdiff
public class ShowOrders : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
    }

+   public readonly ShowOrderDetails ShowOrderDetailsController = new ShowOrderDetails();

+   public void RunShowOrderDetails()
+   {
+       ShowOrderDetailsController.Run(Orders.OrderID);
+   }

    public void Run()
    {
        Execute();
    }
...
```

### in the ShowOrdersView
```csdiff
partial class ShowOrdersView : Shared.Theme.Controls.Form
{
    ShowOrders _controller;
    public ShowOrdersView(ShowOrders controller)
    {
        _controller = controller;
        InitializeComponent();

+       subForm1.SetController(_controller.ShowOrderDetailsController,
+            _controller.RunShowOrderDetails);
    }
...
```

### in the ShowOrderDetails
```csdiff
public class ShowOrderDetails : UIControllerBase
{

    public readonly Models.Order_Details Order_Details = new Models.Order_Details();
    public ShowOrderDetails()
    {
        From = Order_Details;
    }

    public void Run(Number orderId)
    {
+       Where.Clear();
        Where.Add(Order_Details.OrderID.IsEqualTo(orderId));
        Execute();
    }
...
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/9Q-N33Dmens?list=PL1DEQjXG2xnLPQ2gXavQ-vUm15AzniI8L" frameborder="0" allowfullscreen></iframe>