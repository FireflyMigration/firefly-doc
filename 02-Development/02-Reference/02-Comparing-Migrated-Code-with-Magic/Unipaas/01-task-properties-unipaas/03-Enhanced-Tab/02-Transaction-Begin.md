# Transaction Begin 

Name in Migrated Code: **Transaction Scope**  
Location in Migrated Code: **OnLoad Method**  
Values: 

| Magic Name          | Migrated Code Name |
|---------------------|--------------------|
| Before Task Prefix  | Task               |
| OnRecordLock        | RowLocking         |
| BeforeRecordPrefix  | Row                |
| BeforeRecordSuffix  | LeaveRow           | 
| Before Record Update| SaveToDataBase     | 
| None                | None               | 
| Group               | Group              | 

Note: The Group option is only applicable for BusinessProcess.  
Example: 
```csdiff
TransactionScope = TransactionScopes.RowLocking; 
```
---
**See Also:** 
* [UIController TransactionScope Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_TransactionScope.htm) 
* [BusinessProcess TransactionScope Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_TransactionScope.htm) 
* [TransactionScope Enum](http://fireflymigration.com/reference/html/T_Firefly_Box_TransactionScopes.htm) 
---