* We'll create a new controller 'GetOrderStatisticsDemoNumberParameter`
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
+   readonly Models.Order_Details Order_Details = new Models.Order_Details();
    public GetOrderStatisticsDemoNumberParameter()
    {
+       From = Order_Details;
    }
    public void Run()
    {
        Execute();
    }
}
```
* In Magic, any parameter was also a local column
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
+   readonly NumberColumn OrderId = new NumberColumn();
    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
    }
    public void Run()
    {
        Execute();
    }
}
```
* When we receive it as a parameter, we'll add it to the `Run` method, and call the `BindParameter` method to bind the parameter to the local column
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly NumberColumn OrderId = new NumberColumn();
    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
    }
+   public void Run(NumberParameter orderId)
    {
+       BindParameter(OrderId, orderId);
        Execute();
    }
}
```
* This is how the migrated code reflects parameters.
  * A Local column
  * A `NumberParameter`
  * And a call to the `BindParameter` method
* Since we use a local column for the parameter value, we can write the `Where` in the constructor, and we no longer have to write the `Where` in the `Run` method.
* The `BindParameter` method  will make sure that the local column `OrderId` will have the value of the parameter and vice versa. This update will happen before the `OnLoad` method get's executed
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly NumberColumn OrderId = new NumberColumn();
    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
+       Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    }
    public void Run(NumberParameter orderId)
    {
        BindParameter(OrderId, orderId);
        Execute();
    }
}
```
* Let's add the Quantity
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly NumberColumn OrderId = new NumberColumn();
+   readonly NumberColumn Quantity = new NumberColumn();

    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
        Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    }
+   public void Run(NumberParameter orderId, NumberParameter quantity)
    {
        BindParameter(OrderId, orderId);
+       BindParameter(Quantity, quantity);
        Execute();
    }
}
```
* We need to make sure Quantity will be set to zero.
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly NumberColumn OrderId = new NumberColumn();
    readonly NumberColumn Quantity = new NumberColumn();

    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
        Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    }
    public void Run(NumberParameter orderId, NumberParameter quantity)
    {
        BindParameter(OrderId, orderId);
        BindParameter(Quantity, quantity);
        Execute();
    }
+	protected override void OnStart()
+   {
+       Quantity.Value = 0;
+   }
}
```

* And update the `Quantity` local column in the `OnLeaveRow` method
```csdiff
public class GetOrderStatisticsDemoNumberParameter : BusinessProcessBase
{
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly NumberColumn OrderId = new NumberColumn();
    readonly NumberColumn Quantity = new NumberColumn();

    public GetOrderStatisticsDemoNumberParameter()
    {
        From = Order_Details;
        Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    }
    public void Run(NumberParameter orderId, NumberParameter quantity)
    {
        BindParameter(OrderId, orderId);
        BindParameter(Quantity, quantity);
        Execute();
    }
 	protected override void OnStart()
    {
        Quantity.Value = 0;
    }
+   protected override void OnLeaveRow()
+   {
+       Quantity.Value += Order_Details.Quantity;
+   }
}
```
* The usage of `BindParameter` makes sure that when the controller ends, the value in the local column `Quantity` will be returned to the `quantity` `NumberParameter`

<iframe width="560" height="315" src="https://www.youtube.com/embed/vvI5Sd8b2-Q?list=PL1DEQjXG2xnKwFgNR1U2nGp4GyrPETlZE" frameborder="0" allowfullscreen></iframe>

