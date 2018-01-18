## Index

Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **InitializeDataView Method**  

Examples:
```csdiff 
void InitializeDataViewAndUserFlow()
{
        From = Customers;
+        OrderBy = Customers.SortByCustomerID;
}
```
---
**See Also:**
* [UIController OrderBy](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OrderBy.htm)  
* [BusinessProcess OrderBy](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_OrderBy.htm)  
----