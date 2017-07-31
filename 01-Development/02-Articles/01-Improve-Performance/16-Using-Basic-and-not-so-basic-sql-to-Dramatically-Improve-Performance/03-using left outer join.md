Before
```csdiff
select OrderID,ProductID

from [Order Details] od 
```

After
```csdiff
select OrderID,
+p.CategoryID

from [Order Details] od 
+left outer join Products p on p.ProductID = od.ProductID
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/oBaxs8BDonk?list=PL1DEQjXG2xnLgvHTh1MJvWScqgyqvsxSu" frameborder="0" allowfullscreen></iframe>