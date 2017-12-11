keywords: Task Properties, Sort, OrderBy, According to Index

Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **InitializeDataView method**  

![](2017-11-20_12h37_13.png)

## Migrated Code Example

```csdiff   
void InitializeDataView()
{
    From = Products;
+   OrderBy.Add(Products.ProductName);
+   OrderBy.Add(Products.UnitPrice, SortDirection.Descending);
}
```

## Property Values
By Default, the sort will be defined as non-unique.

## See Also 
* [UIController OrderBy Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OrderBy.htm)  

