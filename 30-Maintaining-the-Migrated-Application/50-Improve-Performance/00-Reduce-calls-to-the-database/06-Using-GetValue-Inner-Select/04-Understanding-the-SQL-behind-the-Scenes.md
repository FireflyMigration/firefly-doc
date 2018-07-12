```csdiff
Select A.OrderID, A.ProductID, A.UnitPrice, A.Quantity,

+isnull((select top 1 Rate 
+	from ExchangeRate 
+	where Currency = 'USD' And EffectiveDate <= B.OrderDate 
+	Order By Currency desc, EffectiveDate desc),0)

,B.OrderID, B.OrderDate 
From dbo.[Order Details] A 
  left outer join dbo.Orders B on B.OrderID = A.OrderID 
Order by A.OrderID, A.ProductID
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/Z28xIYbGQ-M?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>