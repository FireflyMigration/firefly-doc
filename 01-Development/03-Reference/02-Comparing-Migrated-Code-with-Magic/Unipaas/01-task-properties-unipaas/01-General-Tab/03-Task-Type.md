# Task Type

The Task Type in Magic is either Online or Batch. In the migrated code, online Tasks convert to Classes which inherit from the UIController Class, while Batch tasks convert to Classes which inherit from the BusinessProcess Class.

Name in Migrated Code: **UIController, BusinessProcess**  
Location in Migrated Code: **Class**  

Example: UIController:
```csdiff
internal class Orders1 :UIControllerBase 
{
}
```
Example: BusinessProcess:
```csdiff
internal class Print_Order : BusinessProcessBase 
{
}
```
Note: The FlowUIController Class is used for Magic Code from Online tasks that have code in the Record Main. For such Code, The migrated code will inherit from the FlowUIController Class:
```csdiff
internal class Orders1 : FlowUIControllerBase 
{
}
```
---
**See Also:**
- [UIController Class](http://fireflymigration.com/reference/html/T_Firefly_Box_UIController.htm.htm)
- [BusinessProcess Class](http://fireflymigration.com/reference/html/T_Firefly_Box_BusinessProcess.htm)
- [UIController Class Members](http://www.fireflymigration.com/reference/html/AllMembers_T_Firefly_Box_UIController.htm)
- [Business Process Class Members](http://www.fireflymigration.com/reference/html/AllMembers_T_Firefly_Box_BusinessProcess.htm)
---