Commands that are added using Flow Add will be executed based on their position relative to the Columns Collection.
The flow is executed line by line according to the column collection and the flow.Add commands respectively.
The Flow will also get executed when you leave a changed row - based on your position in the column collection.
```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
+   Flow.Add(() => Message.ShowWarning("Hello"));
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/i-_Rool5oQ8?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>