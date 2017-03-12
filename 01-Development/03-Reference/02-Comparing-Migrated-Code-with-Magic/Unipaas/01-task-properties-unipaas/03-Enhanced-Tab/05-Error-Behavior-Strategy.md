# Error Behavior Strategy

Name in Migrated Code: **OnDatabaseErrorRetry**  
Location in Migrated Code: **OnLoad Method**  

Example: Error behavior strategy = abort
```csdiff 
OnDatabaseErrorRetry = false; 
```
Example: Error behavior strategy = recover 
```csdiff 
OnDatabaseErrorRetry = true; 
```
---
**See Also:** 
* [UIController OnDatabaseError Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OnDatabaseErrorRetry.htm) 
* [BusinessProcess OnDatabaseError Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_OnDatabaseErrorRetry.htm) 

---