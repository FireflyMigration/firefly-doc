```csdiff
+Insert into CategorySales (Year, CategoryID, Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec) 
select year,CategoryID,
sum(case when month=1 then  rowTotal else 0 end) Jan,
sum(case when month=2 then  rowTotal else 0 end) Feb,
sum(case when month=3 then  rowTotal else 0 end) Mar,
sum(case when month=4 then  rowTotal else 0 end) Apr,
sum(case when month=5 then  rowTotal else 0 end) May,
sum(case when month=6 then  rowTotal else 0 end) Jun,
sum(case when month=7 then  rowTotal else 0 end) Jul,
sum(case when month=8 then  rowTotal else 0 end) Aug,
sum(case when month=9 then  rowTotal else 0 end) Sep,
sum(case when month=10 then  rowTotal else 0 end) Oct,
sum(case when month=11 then  rowTotal else 0 end) Nov,
sum(case when month=12 then  rowTotal else 0 end) Dec

from
(select od.OrderID,p.CategoryID , year(o.OrderDate) year, month(o.OrderDate) month,
round(od.UnitPrice * od.Quantity
*isnull( (select top 1 rate from ExchangeRate er 
where er.Currency = 'USD' and er.EffectiveDate <=o.OrderDate
order by er.EffectiveDate desc),1),2)
rowTotal

from [Order Details] od 
	left outer join Products p on p.ProductID = od.ProductID
	left outer join Orders o on o.OrderID = od.OrderID) rawData

group by year,CategoryID
order by year,CategoryID
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/uUfguSb0Kyw?list=PL1DEQjXG2xnLgvHTh1MJvWScqgyqvsxSu" frameborder="0" allowfullscreen></iframe>