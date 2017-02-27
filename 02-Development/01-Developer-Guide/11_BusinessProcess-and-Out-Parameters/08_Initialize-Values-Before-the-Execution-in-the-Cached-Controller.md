keywords:Where.Clear
* Now that we are using `Cached` we are reusing the same instance of the `GetOrderStatistics` class
* We need to adjust the code of the `GetOrderStatistics` class to accommodate the fact that it runs multiple times.
* Add a "Break Point" in the `Run` method, and review the value of `Where` for the several times you run this controller.
* We can see that the where has multiple values  
![2017 02 27 10H18 58](2017-02-27_10h18_58.png)
### The Where Problem Explained
* In our run method, we do `Where.Add` this means that whenever we run the code, a new condition is added to the Where.
* In first run, the where is: `OrderID = 10388`
* In the Second run, the where is `OrderID = 10388 And OrderID = 10377`
* In the Third run, the where is `OrderID = 10388 And OrderID = 10364 And OrderID = 10377`, this condition doesn't return any row, since no row is both 10388 and 10364 and 10377.
* To Clear the Where, before every execution, we'll use the `Where.Clear` method.
```csdiff
public void Run(Number OrderId,NumberColumn Count,NumberColumn Quantity, NumberColumn totalAmount)
{
+   Where.Clear();
    Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Execute();
    Count.Value = _count;
    Quantity.Value = _quantity;
    totalAmount.Value = _totalAmount;
}
```
* Now that we've fixed that, we can see that when we are running the code, the values in Items, Total Quantity and Total Amount are always increasing.
* That is because we only initialized them with the value 0, when the class was created and not before every run.
```csdiff
Number _count = 0;
Number _quantity = 0;
Number _totalAmount = 0;
protected override void OnLeaveRow()
{
    _count++;
    _quantity += Order_Details.Quantity;
    _totalAmount += Order_Details.Quantity * Order_Details.Quantity.UnitPrice;
}
```
* So now we need to initialize them before every execution in the `Run` method. Make sure to do that before the call to the `Execute` method in the base class
```csdiff
public void Run(Number OrderId,NumberColumn Count,NumberColumn Quantity, NumberColumn totalAmount)
{
+   Where.Clear();
    Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
+   _count = 0;
+   _quantity = 0;
+   _totalAmount = 0;
    Execute();
    Count.Value = _count;
    Quantity.Value = _quantity;
    totalAmount.Value = _totalAmount;
}
```
* And now, everything works.
<iframe width="560" height="315" src="https://www.youtube.com/embed/59_rs9udFSk?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>


