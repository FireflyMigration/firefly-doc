```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
    Flow.Add(() => Message.ShowError("Hello")
+        , FlowMode.Tab);
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/o5A3Y0nWV7Y?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>