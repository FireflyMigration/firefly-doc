keywords: task properties, range, locate, SQL where, expression, DB SQL
# SQL Where
A screen shot of Magic's SQL Where tab appears below:

![Range-Locate-SQL-Where](Range-Locate-SQL-Where.jpg)

## Expression / DB SQL

Name in Migrated Code: **Where.Add**  
Location in Migrated Code: **InitializeDataView()**  

The migrated code creates a phrase representing the migrated expression.

Example:
```csdiff
void InitializeDataView()
    {
        From = OrderDetails;
        Where.Add("{0} > 5 AND {1} > 0", OrderDetails.OrderID, OrderDetails.Quantity);
```


