```csdiff
select od.OrderID,p.CategoryID , year(o.OrderDate) year, month(o.OrderDate) month,
+od.UnitPrice * od.Quantity
+* (select top 1 rate from ExchangeRate er 
+where er.Currency = 'USD' and er.EffectiveDate <=o.OrderDate
+order by er.EffectiveDate desc)
+rowTotal

from [Order Details] od 
	left outer join Products p on p.ProductID = od.ProductID
	left outer join Orders o on o.OrderID = od.OrderID
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/iqGEy0u9FNQ?list=PL1DEQjXG2xnLgvHTh1MJvWScqgyqvsxSu" frameborder="0" allowfullscreen></iframe>