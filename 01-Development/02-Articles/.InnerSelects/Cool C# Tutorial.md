```csdiff
Select OrderID, CustomerID, OrderDate,
isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = Orders.OrderID
),0)
From dbo.Orders 
Order by OrderID
```

```csdiff
Select top 1 OrderID, ProductID 
From dbo.[Order Details] 
Where OrderID = 10249
Order by OrderID, ProductID
```
```
Select OrderID, CustomerID, OrderDate 
From dbo.Orders 
Order by OrderID
```