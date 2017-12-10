keywords: task properties, range, locate, SQL where, expressions
# Position Range

Name in Migrated Code: **Where.Add**  
Location in Migrated Code: **InitializeDataView()**  

![Range-Locate-Expressions-poition](Range-Locate-Expressions-poition.jpg)

The migrated code uses a function named CreatePrimaryKeyFilter for this type of range
using the blob containing the position information.

Example:
```csdiff
void InitializeDataView()
{
    From = OrderDetails;
    Where.Add(u.CreatePrimaryKeyFilter(From, MyPositionBlob));
```


