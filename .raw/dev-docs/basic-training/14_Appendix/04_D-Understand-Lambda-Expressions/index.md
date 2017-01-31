### Understand Lambda Expressions

A lambda expression is an anonymous function that can be passed as an argument or returned by a method. Lambda expressions are useful for providing a way to calculate a value rather than sending the actual value, or to provide an action that will be executed by the receiver.

#### Using Lambda in BindValue Expressions

* **Single Line Lambda**

Demo:
```C#
Colums.Add(ShippingDate).BindValue(() => Orders.OrderDate.AddMonths(1));
```
* **Multi Line Lambda**

Demo:
```C#
Colums.Add(ShippingDate).BindValue(() => 
                                        {
                                            if (Orders.ShipCountry == "USA")
                                                return Orders.OrderDate.AddMonths(1);
                                            else 
                                                return Orders.OrderDate.AddMonths(2);
                                        });
```
#### Using Lambda in Event Handlers
* **Handler Method**

Demo:

```C#
    Handlers.Add(Keys.F7).Invokes += ShowOrders_Invokes;
} // End of Constructor

void ShowOrders_Invokes(Firefly.Box.Advanced.HandlerInvokeEventArgs e)
{
    MessageBox.Show("F7 Handler");
}
```

* **Single Line Handler**

Demo:
```C#
Handlers.Add(Keys.F7).Invokes += e => MessageBox.Show ("F7 Handler");
```

* **Multi Line Handler**

Demo:
```C#
Handlers.Add(Keys.F7).Invokes += e =>
                                     {
                                        e.Handled = true;    
                                        MessageBox.Show ("F7 Handler");
                                     }
```