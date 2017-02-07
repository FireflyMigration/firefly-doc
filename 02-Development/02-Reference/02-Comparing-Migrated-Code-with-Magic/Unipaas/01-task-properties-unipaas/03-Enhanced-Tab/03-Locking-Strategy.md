# Locking Strategy 
Name in Migrated Code: **Rowlocking**  
Location in Migrated Code: **OnLoad Method**  
Values:  

| Magic Name          | Migrated Code Name | 
|---------------------|--------------------|
| No Lock             | None               | 
| Immediate           | OnRowLoading       |
| Before Update       | OnRowSaving        | 
| On Modify           | OnUserEdit         | 

Example: OnRowSaving: 
```csdiff
RowLocking = LockingStrategy.OnRowSaving; 
```
---
**See Also:** 
* [UIController LockingStrategy Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_RowLocking.htm) 
* [BusinessProcess LockingStrategy Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_RowLocking.htm)
* [LockingStrategy Enum](http://www.fireflymigration.com/reference/html/T_Firefly_Box_LockingStrategy.htm)
---
Note: If the Locking Strategy is “On Modify” in Magic (LockingSTrategy.OnUserEdit) then it may be necessary when calling a task or program to specify that the current record with all its links must be locked.  
This may be specified in Magic by clicking Ctrl+P on the call task or call program line, and specifying the lock as 'Yes' in the dialog that appears. To support this functionality, the LockCurrentRow method is employed.  

As an example: 
```csdiff
if(V_counter == 1) 
{ 
    LockCurrentRow(); 
    new ProgramName(this).Run(); 
}  
```
---
**See Also:** 
* [UIController LockCurrentRow Method](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_LockCurrentRow.htm) 
* [BusinessProcess LockCurrentRow Method](http://www.fireflymigration.com/reference/html/M_Firefly_Box_BusinessProcess_LockCurrentRow.htm) 
--- 