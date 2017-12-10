keywords: task properties, range, locate, SQL where, expressions
# Locate Expression

Name in Migrated Code: **StartOnRowWhere.Add**  
Location in Migrated Code: **InitializeDataView()**  

![Range-Locate-Expressions-locate-expression](Range-Locate-Expressions-locate-expression.jpg)

Example:
```csdiff
void InitializeDataView()
{
    From = OrderDetails;
    StartOnRowWhere.Add(() => OrderDetails.Quantity > 0);
```


