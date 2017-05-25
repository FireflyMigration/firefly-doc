keywords:BindEqualTo

* In Magic you couldn't set the default value property to a runtime determined value, and instead you would use an "Init" expression, which gets migrated to "BindValue"
### Migrated code will usually use BindValue instead of DefaultValue
```csdiff
public void Run(Number OrderId)
{
-   Order_Details.OrderID.DefaultValue = OrderId;
+   Order_Details.OrderID.BindValue(() => OrderId);
    Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Execute();
}
```
* Since this is a common pattern, used throughout the code, the migration engine automatically translates this to 'BindEqualTo' so instead of two lines, you now have one.
```csdiff
public void Run(Number OrderId)
{
-   Order_Details.OrderID.BindValue(() => OrderId);
-   Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
+   Where.Add(Order_Details.OrderID.BindEqualTo(OrderId));
    Execute();
}
```
### Final Result
```csdiff
public void Run(Number OrderId)
{
    Where.Add(Order_Details.OrderID.BindEqualTo(OrderId));
    Execute();
}
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/vJQTHCnNhro?list=PL1DEQjXG2xnJxhcxZ1ItQdfroctirL8Qr" frameborder="0" allowfullscreen></iframe>

