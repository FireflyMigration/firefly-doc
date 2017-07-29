To Maintain the relation implementation for Pervasive usage, we'll put it in an If Statement.

```csdiff
Relations.Add(Orders, SQLHelper.OuterJoin(), Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);
+if (ENV.Data.DataProvider.BtrieveMigration.UseBtrieve)
+{
    Relations.Add(ExchangeRates, ExchangeRates.Currency.IsEqualTo("USD").And(
            ExchangeRates.EffectiveDate.IsLessOrEqualTo(Orders.OrderDate)),
        ExchangeRates.SortByDate);
    Relations[ExchangeRates].OrderBy.Reversed = true;
+}
Relations.Add(CategorySales, RelationType.InsertIfNotFound, CategorySales.Year.BindEqualTo(() => u.Year(Orders.OrderDate)).And(
        CategorySales.CategoryID.BindEqualTo(Products.CategoryID)), 
```

We'll use the same condition when adding the columns.
```csdiff
Columns.Add(Orders.OrderID);
Columns.Add(Orders.OrderDate);
+if (ENV.Data.DataProvider.BtrieveMigration.UseBtrieve)
+{
    Columns.Add(ExchangeRates.Currency);
    Columns.Add(ExchangeRates.EffectiveDate);
    Columns.Add(ExchangeRates.Rate);
    Rate.BindValue(ExchangeRates.Rate);
+}
Columns.Add(Rate);
Columns.Add(CategorySales.Year);
Columns.Add(CategorySales.CategoryID);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/6F9RSUUQoUk?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>