Before
```csdiff
select OrderID,ProductID

from [Order Details] od 
```

A select statement with one column as inner select
```csdiff
select OrderID,ProductID,
+(select p.CategoryID from Products p where p.ProductID=od.ProductID) categoryId

from [Order Details] od 

```

<iframe width="560" height="315" src="https://www.youtube.com/embed/nli6qu_bAt8?list=PL1DEQjXG2xnLgvHTh1MJvWScqgyqvsxSu" frameborder="0" allowfullscreen></iframe>