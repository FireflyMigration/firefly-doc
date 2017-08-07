The original Query
```csdiff
Select A.OrderID, A.ProductID, A.UnitPrice, A.Quantity, A.Discount, B.OrderID, B.CustomerID, B.OrderDate, C.CustomerID, C.Country 
From dbo.[Order Details] A 
  inner join dbo.Orders B on B.OrderID = A.OrderID 
  inner join dbo.Customers C on C.CustomerID = B.CustomerID 
Order by C.CustomerID
```

Adding Group By
```csdiff
-Select A.OrderID, A.ProductID, A.UnitPrice, A.Quantity, A.Discount, B.OrderID, B.CustomerID, B.OrderDate, C.CustomerID, C.Country 
+Select A.ProductID
From dbo.[Order Details] A 
  inner join dbo.Orders B on B.OrderID = A.OrderID 
  inner join dbo.Customers C on C.CustomerID = B.CustomerID 
-Order by C.CustomerID
+group by A.ProductID
```

Adding the sum
```csdiff
Select A.ProductID,
+sum(A.Quantity), sum(A.Quantity * A.UnitPrice)
From dbo.[Order Details] A 
  inner join dbo.Orders B on B.OrderID = A.OrderID 
  inner join dbo.Customers C on C.CustomerID = B.CustomerID 
group by A.ProductID
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/L0UCnPkZkUY?list=PL1DEQjXG2xnLp-A7typjUccfykKPenrer" frameborder="0" allowfullscreen></iframe>