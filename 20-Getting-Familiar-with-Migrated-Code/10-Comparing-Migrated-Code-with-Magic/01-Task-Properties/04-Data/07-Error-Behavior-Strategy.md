keywords: Task Properties, Data Tab, Error behavior strategy

Name in Migrated Code: **OnDatabaseErrorRetry**  
Location in Migrated Code: **OnLoad Method**  

![](2017-11-15_16h16_42.png) 

## Migrated Code Example 

Error behavior strategy = abort
```csdiff 
OnDatabaseErrorRetry = false; 
```
Error behavior strategy = recover 
```csdiff 
OnDatabaseErrorRetry = true; 
```

## Property Values

| Magic Name          | Migrated Code Name | 
|---------------------|--------------------|
| Recover             |                    | 
| Abort               |                    |

## See Also:
* [UIController OnDatabaseError Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OnDatabaseErrorRetry.htm) 
* [BusinessProcess OnDatabaseError Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_OnDatabaseErrorRetry.htm) 
