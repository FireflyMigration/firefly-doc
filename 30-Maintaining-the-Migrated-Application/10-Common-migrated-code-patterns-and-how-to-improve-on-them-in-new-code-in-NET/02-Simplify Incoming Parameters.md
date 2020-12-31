keywords:MarkParameterColumns,BindParameter,CndRange
In the migrated code parameters are written using `NumberParameter`, `BindParameter` and `MarkParameterColumns` and other complexities that are relevant to complexities that exist in migrated code but rarely relevant for new code that you'll write.

In this article we'll take a common case if filtering the orders in the `Print_Orders` controller.

## Don't use the MarkParameterColumns any more
This method is included in the migrated code to handle one specific use case that you would never use in new code.

All this method does is ensure that if you'll use the `VarName` method for this column, it's name would be prefixed by the word "parameter" instead of the word "virtual"

As you can see, this is useless in new code - so don't use the `MarkParameterColumns` in new code
```csdiff
Columns.Add(Order_Details.UnitPrice);
Columns.Add(Order_Details.Quantity);
Columns.Add(Order_Details.Discount);

Columns.Add(vOrderTotal);
-MarkParameterColumns(pi_OrderID);
#endregion
```

If you want to delete all MarkParameterColumns() from your entire project at once you can easily do this by using the 'Use regular expression' at the 'Find and Replace' option in Visual Studio by entering ```^[ \t]*MarkParameterColumns\(.*``` at the Find box and leaving the Replace box empty.

## Replace NumberParameter with Number
Since we only use the incoming parameter called `ppi_OrderID` to filter the orders of this controller, we can replace the `NumberParameter` with a simple `Number`, move the `Where` to the `Run` method and remove the local column `pi_OrderID` entirely

```csdiff
...
-#region Parameters
-readonly Types.OrderID pi_OrderID = new Types.OrderID { Caption = "pi.Order ID" };
-#endregion
...
void InitializeDataView()
{
    ...
    OrderBy = Order_Details.SortByOrderID;
    #region Column Selection
-   Columns.Add(pi_OrderID);
    // Range on Order if in parameters
    Columns.Add(Order_Details.OrderID);
    ...
    #endregion
}
/// <summary>Print - Order(P#6)</summary>
-public void Run(NumberParameter ppi_OrderID)
+public void Run(Number ppi_OrderID)
{
-   BindParameter(pi_OrderID, ppi_OrderID);
+   Where.Add(CndRange(() => ppi_OrderID != 0, Order_Details.OrderID.IsEqualTo(ppi_OrderID)));
    Execute();
}
```

## Replace CndRange with a simple if
```csdiff
public void Run(Number ppi_OrderID)
{
-   Where.Add(CndRange(() => ppi_OrderID != 0, Order_Details.OrderID.IsEqualTo(ppi_OrderID)));
+   if (ppi_OrderID != 0)
+       Where.Add(Order_Details.OrderID.IsEqualTo(ppi_OrderID));
    Execute();
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/XLc_Xw_9VhE" frameborder="0" allowfullscreen></iframe>

See Also:
[Refactoring Parameters](refactoring-parameters.html)
