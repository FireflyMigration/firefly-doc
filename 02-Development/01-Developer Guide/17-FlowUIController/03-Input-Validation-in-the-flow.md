Keywords:ShowError,FlowAbortException

To prevent the user from proceeding in the flow or leaving the screen use ShowError or FlowAbortException

### code
Use ShowError instead of ShowMessage
```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
+   Flow.Add(() => Message.ShowError("Customer ID has A in it")
        ,() => Orders.CustomerID.Value.Contains("A"));
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/1_i7qw7mi_s?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>