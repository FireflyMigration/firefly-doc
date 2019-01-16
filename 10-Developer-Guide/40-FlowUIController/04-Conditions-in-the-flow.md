```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
   Flow.Add(() => Message.ShowWarning("Customer ID has A in it")
+        ,() => Orders.CustomerID.Value.Contains("A"));
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/695Kr0Rz3Cw?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>
