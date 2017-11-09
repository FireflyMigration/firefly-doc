keywords: lock,call operation
Name in Magic: **Lock**  
In migrated code: **LockCurrentRow()** method

****

The migrated code supports this option by adding the LockCurrentRow() Method before calling the method, for example:

```csdiff
LockCurrentRow();
new Print_Order().Run(); 
```
See also:  
[LockCurrentRow Method for UIController](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_LockCurrentRow.htm)  
[LockCurrentRow Method for BusinessProcess](http://www.fireflymigration.com/reference/html/M_Firefly_Box_BusinessProcess_LockCurrentRow.htm)  