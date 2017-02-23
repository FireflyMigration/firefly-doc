keywords:online task,ui controller,record main,recordmai,רשומה ראשי
FlowUIController is a controller where the tab order is managed by the Columns collection and not by the controls on the form.

It also allows you to inject logic that will be executed when you move between these controls.


### Code
Add the using, change the base class and add the columns

```csdiff
+using Firefly.Box.Flow;
namespace Northwind.Exercise
{
+    public class ShowOrderDemoFlowUIController : FlowUIControllerBase
    {

        public readonly Models.Orders Orders = new Models.Orders();
        public ShowOrderDemoFlowUIController()
        {
            From = Orders;
+           Columns.Add(Orders.OrderID);
+           Columns.Add(Orders.CustomerID);
+           Columns.Add(Orders.EmployeeID);
+           Columns.Add(Orders.OrderDate);
+           Columns.Add(Orders.RequiredDate);
        }
   }
}
```



<iframe width="560" height="315" src="https://www.youtube.com/embed/PHQHmyQCFZY?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>

In non FlowUIController controllers the tab order is controlled by the tab order see [TabOrder article](TabOrder.html)
