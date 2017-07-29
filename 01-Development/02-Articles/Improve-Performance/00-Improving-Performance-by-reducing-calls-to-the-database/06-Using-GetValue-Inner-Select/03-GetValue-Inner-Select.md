```csdiff
Relations.Add(Orders, SQLHelper.OuterJoin(), Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);
if (ENV.Data.DataProvider.BtrieveMigration.UseBtrieve)
{
    Relations.Add(ExchangeRates, ExchangeRates.Currency.IsEqualTo("USD").And(
            ExchangeRates.EffectiveDate.IsLessOrEqualTo(Orders.OrderDate)),
        ExchangeRates.SortByDate);
    Relations[ExchangeRates].OrderBy.Reversed = true;
}
+else
+{
+    var h = new InnerSelectHelper(this);
+    ExchangeRates.SortByDate.Reversed = true;
+    h.TurnToGetValue(this.Rate, ExchangeRates.Rate, ExchangeRates.Currency.IsEqualTo("USD").And(
+            ExchangeRates.EffectiveDate.IsLessOrEqualTo(Orders.OrderDate)),
+        ExchangeRates.SortByDate);
+}
Relations.Add(CategorySales, RelationType.InsertIfNotFound, CategorySales.Year.BindEqualTo(() => u.Year(Orders.OrderDate)).And(
        CategorySales.CategoryID.BindEqualTo(Products.CategoryID)), 
    CategorySales.SortByYearAndCategory);
```

Don't forget to set the Reversed flag on the Index:
```csdiff
+    ExchangeRates.SortByDate.Reversed = true;
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/M98nySHxtMw?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>