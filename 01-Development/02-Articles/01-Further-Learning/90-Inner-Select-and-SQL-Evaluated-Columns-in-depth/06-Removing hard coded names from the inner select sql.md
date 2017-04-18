Before:
```csdiff
V_HasOrderDetails.Name = @"=isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = A.OrderID
),0)";
```
After:
```csdiff
var Order_Details = new Models.Order_Details();
V_HasOrderDetails.Name = $@"=isnull((
Select max(1)
From {Order_Details.EntityName} 
Where {Order_Details.OrderID.Name} = A.{Orders.OrderID.Name}
),0)";
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/-m0NunIMtmw?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>