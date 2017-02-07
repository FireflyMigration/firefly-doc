keywords: frm,form,call operation
Name in Magic: **Frm, Form**  


***
This property, determining which GUI screen will be displayed, is passed in the migrated code as a parameter, when calling the Method.  
An example of this implementation is as follows:


```csdiff
 new Print_Order().Run(Orders.OrderID, new UI.ShowOrders_UI(this));
```

```
```

In the called Method, the code will look like this:
```csdiff
public void Run(NumberParameter ppi_OrderID, Firefly.Box.UI.Form view)
{
    BindParameter(pi_OrderID, ppi_OrderID);
    BindView(view);
    Execute();
}
```


