keywords: task properties, range, locate, SQL where, expressions

Name in Migrated Code: **NonDbWhere.Add**  
Location in Migrated Code: **InitializeDataView**  

![Range-Locate-Expressions-range-expression](Range-Locate-Expressions-range-expression.jpg)

## Example:
```csdiff
void InitializeDataView()
{
    From = OrderDetails;
+    NonDbWhere.Add(() => OrderDetails.Quantity > 0);
```


