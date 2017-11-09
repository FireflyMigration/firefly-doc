* So far we received the OrderId as an in parameter, so we made it a "Value" type (`Number`) that only gets sent in.
* Now we want to return the statistical information we gathered (count, quantity, totalAmount) to the calling code.
* We could used the `return` keyword, but that would restrict us to return just one value, and we want to return 3.
* We could also use the C# 'out' or 'ref' keywords, but they have some disadvantages that are beyond the scope of this course.
* To return a value to the calling code, we'll receive a parameter of type "Column" (in our case `NumberColumn`).
* This means that the calling code will send us the actual "Column" to which it wants us to send the result to.
* We'll receive the Columns as parameters, and update their value based on the values collected by this business process

```csdiff
+public void Run(Number OrderId,NumberColumn Count,NumberColumn Quantity, NumberColumn totalAmount)
{
    Where.Add(Order_Details.OrderID.IsEqualTo(OrderId));
    Execute();
+   Count.Value = _count;
+   Quantity.Value = _quantity;
+   totalAmount.Value = _totalAmount;
}
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
* Call the'GetOrderStatistics` BusinessProcess using the "Controllers" developer tool
* Note how the gathered statistical information is returned to the Count,Quantity and totalAmount columns.
* Review that "OrderId" is of type 'Number' which is a "Value" type, so if we set it's value, the value we set will not affect the calling code, as opposed to "Count" which is of type 'NumberColumn" which is a "Column" type, so when we set it's value, that value returns to the calling code.

<iframe width="560" height="315" src="https://www.youtube.com/embed/eyeww84-coA?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>




