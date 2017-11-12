```csdiff
var h = new InnerSelectHelper(this);
ExchangeRates.SortByDate.Reversed = true;

+var r = h.GetValueHelper(ExchangeRates.Currency.IsEqualTo("USD").And(
+        ExchangeRates.EffectiveDate.IsLessOrEqualTo(Orders.OrderDate)),
+    ExchangeRates.SortByDate);
+r.TurnToGetValue(this.Rate, ExchangeRates.Rate);
+r.TurnToGetValue(this.EffectiveDate, ExchangeRates.EffectiveDate);

```


<iframe width="560" height="315" src="https://www.youtube.com/embed/lyGRQcwV0V8?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>