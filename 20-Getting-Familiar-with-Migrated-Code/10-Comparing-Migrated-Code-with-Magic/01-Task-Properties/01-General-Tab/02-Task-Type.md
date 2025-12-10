keywords:UIController, BusinessProcess,FlowUIController, task properties
# Task Type

Name in Migrated Code: **UIController, BusinessProcess**, **FlowUIControllerBase**   
Location in Migrated Code: **Class**  

![Task properties task-type](Task-properties-task-type.jpg)

## Values:

| Magic Name | Migrated Code Name      |
|------------|-------------------------|
| Batch                    | BusinessProcessBase |
| Online (no record main)  | UIControllerBase    |
| Online (with record main)| FlowUIControllerBase|
| Browser                  | NA                  |
| Rich Client              | NA                  |


## Example BusinessProcess:
```csdiff
+internal class Print_Order : BusinessProcessBase 
{
}
```
## Example UIController:
```csdiff
+internal class Show_Order :UIControllerBase 
{
}
```
## Example FlowUIController:
```csdiff
+internal class Show_Order : FlowUIControllerBase 
{
}
```

## Note:
The Task Type in Magic is either Online or Batch. In the migrated code, a tasks is convert to a class 
which inherits from the corresponding class type.

---
**See Also:**
- [UIController Class](/referencehtml/T_Firefly_Box_UIController.htm)
- [BusinessProcess Class](/referencehtml/T_Firefly_Box_BusinessProcess.htm)
- [UIController Class Members](/reference/html/AllMembers_T_Firefly_Box_UIController.htm)
- [Business Process Class Members](/reference/html/AllMembers_T_Firefly_Box_BusinessProcess.htm)
---