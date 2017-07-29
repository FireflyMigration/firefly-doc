Were going to use an Inner Select to get the value from the Exchange Rates table.

The first step is to add a local Column instead of the `Rate` column from the `ExchangeRate` entity.

Add the `Rate` Local Column
```csdiff
#region Columns
readonly Types.Amount RowTotal = new Types.Amount { Caption = "RowTotal" };
+readonly NumberColumn Rate = new NumberColumn("Rate", "2.4");
#endregion
```

Add the `Rate` Local Column to the Column Collection, and add a BindValue for it.
```csdiff
Columns.Add(ExchangeRates.Currency);
Columns.Add(ExchangeRates.EffectiveDate);
+Columns.Add(ExchangeRates.Rate);
+Rate.BindValue(ExchangeRates.Rate);
Columns.Add(Rate);
Columns.Add(CategorySales.Year);
Columns.Add(CategorySales.CategoryID);
```

Use the local column in the expression
```csdiff
protected override void OnLeaveRow()
{
-   RowTotal.Value = Order_Details.UnitPrice * Order_Details.Quantity * ExchangeRates.Rate;
+   RowTotal.Value = Order_Details.UnitPrice * Order_Details.Quantity * this.Rate;
                
    if (u.Month(Orders.OrderDate) == 1)
        CategorySales.Jan.Value += RowTotal;

```


<iframe width="560" height="315" src="https://www.youtube.com/embed/IxWUUV_PZTI?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>