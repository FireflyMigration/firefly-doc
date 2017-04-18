In this video we'll explore SQL Inner Selects outside the context of migrated code.

### The main select statement:
```
Select OrderID, CustomerID, OrderDate 
From dbo.Orders 
Order by OrderID
```
### The relation select statement:
For every row we issue the following select statement:
```
Select top 1 OrderID, ProductID 
From dbo.[Order Details] 
Where OrderID = @0
Order by OrderID, ProductID
```

@0 is replaced with the specific Order Id for each query

### Combine the two queries into a single query:
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
> `isnull` is used because when no rows are found, a null is returned and I don't like nulls :)

<iframe width="560" height="315" src="https://www.youtube.com/embed/mTT8p9vA0Z4?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>