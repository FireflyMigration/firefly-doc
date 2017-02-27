* We'll start by filtering the ShowOrderDetails controller with a hard coded OrderID

```csdiff
public void Run()
{
+   Where.Add(Order_Details.OrderID.IsEqualTo(10250));
    Execute();
}
```
* Add a parameter of type `Number` to our run method, and use that value to filter oru controller
```csdiff
+public void Run(Number OrderId)
{
+   Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Execute();
}
```
* When we'll run this controller from the "Controllers" developer tool, it'll ask us to send a value for that parameter
* Run the "ShowOrderDetails" controller multiple times with several values to see the parameters in action
* Note that we are sending a `Number` and not a `NumberColumn`. We refer to it as a "Value" type vs a "Column" type.
* When we receive a parameter which is a "Value" type (Number, Date, Time, Text, Bool, string, etc...) it indicates that we are sending an "In" parameter, and any change we'll make to that value in our controller will remain only in the scope of this controller and will not affect the calling controller.
* When we want to send an in out parameter we'll send a "Column" type such as "NumberColumn". We'll cover that later in this course
<iframe width="560" height="315" src="https://www.youtube.com/embed/4NaZwmlI4zI?list=PL1DEQjXG2xnJxhcxZ1ItQdfroctirL8Qr" frameborder="0" allowfullscreen></iframe>

