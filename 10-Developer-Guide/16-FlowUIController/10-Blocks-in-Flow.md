﻿FlowUIController is a controller where the tab order is managed by the Columns collection and not by the controls on the form.

It also allows you to inject logic that will be executed when you move between these controls.


```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
+   Flow.StartBlock(FlowMode.ExpandBefore);
+   {
        Flow.Add(() => Message.ShowWarning("Hello"));
        Flow.Add(() => Message.ShowWarning("World"));
+   }
+   Flow.EndBlock();
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/mIr6B-X_Ej8?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>