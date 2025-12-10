```csdiff
void InitializeDataView()
{
    From = Orders;

    Orders.Columns.Add(V_HasOrderDetails);
    V_HasOrderDetails.Name = @"isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = Orders.OrderID
),0)";
            
+   Orders.Columns.Add(TotalQuantity);
+   TotalQuantity.Name = @"isnull((
+Select sum(Quantity)
+From dbo.[Order Details] 
+Where OrderID = Orders.OrderID
+),0)";

    OrderBy = Orders.SortByPK_Orders;
```

Then we remove the Quantity inner class and it's reference in the `OnEnterRow`
```csdiff
protected override void OnEnterRow()
{
-   TotalQuantity.Value = 0;
-   if (V_HasOrderDetails)
-       Cached<GetTotalQuantity>().Run();
    _layout.Orders.WriteTo(_ioPrinter);
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/QIRdh6lMKO4?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>

Another way to do this, without hard coded SQL statements, would be to use the InnerSelectHelper. See [Using SQL inner select](using-sql-inner-select.html)
