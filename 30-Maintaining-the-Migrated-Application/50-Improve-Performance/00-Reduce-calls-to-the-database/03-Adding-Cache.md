Use cache when you have a relation that is unique (returns only one row), and that returns the same row many times.

In our case we are accessing the Products table based on ID (it's unique, so it returns only one row) and we get the same product many many times (for many orders)

```csdiff
class CollectOrderDetails : BusinessProcessBase 
{
    #region Models
    readonly Models.Order_Details Order_Details = new Models.Order_Details 
    { 
        AllowRowLocking = true 
    };
    readonly Models.Products Products = new Models.Products 
    { 
        AllowRowLocking = true,
+       Cached = true 
    };
    readonly Models.Orders Orders = new Models.Orders 
    { 
        ReadOnly = true 
    };
    readonly Models.ExchangeRates ExchangeRates = new Models.ExchangeRates 
    { 
        ReadOnly = true 
    };
    readonly Models.CategorySales CategorySales = new Models.CategorySales 
    { 
        AllowRowLocking = true 
    };
    #endregion
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/vyQVOK8YIMU?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>