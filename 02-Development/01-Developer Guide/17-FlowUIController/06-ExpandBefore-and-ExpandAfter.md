"ExpandBefore" and ExpandAfter" are widely used in code that was migrated from Older version of magic, 9, 8 etc....
It's common usages are:
* Next to a code columns (for example customer Id) - to allow the user to select a customer.
* Next to a column that is bound to a button on the screen. That button than raises the Expand event which in turn will code the code next to it in the flow using ExpandAfter or ExpandBefore
* Next to columns that are bound to TabControls. When ever a tab changes - it automatically fires the expand event which then runs the code in the flow with ExpandBefore and ExpandAfter

```csdiff
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
    Flow.Add(() => Message.ShowError("Hello")
+        , FlowMode.ExpandBefore);
    Columns.Add(Orders.EmployeeID);
    Columns.Add(Orders.OrderDate);
    Columns.Add(Orders.RequiredDate);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/rn2AEzLdnQo?list=PL1DEQjXG2xnJ622kTVgstJEVh0DGRHkmU" frameborder="0" allowfullscreen></iframe>