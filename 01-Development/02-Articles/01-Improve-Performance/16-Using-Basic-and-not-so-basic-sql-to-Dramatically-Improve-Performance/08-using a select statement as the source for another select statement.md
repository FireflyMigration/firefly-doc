```csdiff
+select year
+
+from(
    select od.OrderID,p.CategoryID , year(o.OrderDate) year, month(o.OrderDate) month,
    round(od.UnitPrice * od.Quantity
    *isnull( (select top 1 rate from ExchangeRate er 
    where er.Currency = 'USD' and er.EffectiveDate <=o.OrderDate
    order by er.EffectiveDate desc),1),2)
    rowTotal

    from [Order Details] od 
	    left outer join Products p on p.ProductID = od.ProductID
	    left outer join Orders o on o.OrderID = od.OrderID
+) rawData
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/fLGTBy9OCac?list=PL1DEQjXG2xnLgvHTh1MJvWScqgyqvsxSu" frameborder="0" allowfullscreen></iframe>