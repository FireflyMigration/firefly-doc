keywords: Task Properties, Sort, OrderBy, Unique

Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **InitializeDataView method**  

![](2017-11-20_12h24_07.png)

## Migrated Code Example

```csdiff   
void InitializeDataView()
{
    From = Products;
    OrderBy.Add(Products.ProductName);
    OrderBy.Add(Products.UnitPrice, SortDirection.Descending);
+   OrderBy.Unique = true;
}
```  

## Property Values
Indicates that the columns used in the sort are unique

## See Also
* [UIController OrderBy Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OrderBy.htm)  
