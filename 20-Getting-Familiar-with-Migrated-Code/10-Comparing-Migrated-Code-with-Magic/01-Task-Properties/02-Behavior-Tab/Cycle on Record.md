keywords: Task Properties, Behavior Tab, Cycle on record, Cycle record main
 
 Name in migrated code: **GoToToNextRowAfterLastControl**  
 Location in migrated code: **OnLoad**

Name in migrated code: **GoToToNextRowAfterLastControl**  
Location in migrated code: **OnLoad**

![2017 11 13 16H01 06](2017-11-13_16h01_06.png)

## Migrated Code Example
```csdiff   
protected override void OnLoad()
{
+    GoToToNextRowAfterLastControl = true;
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindGoToToNextRowAfterLastControl(() => !(ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR"));
}
```        



## Property Values
True or false. The default is **false** which is Cycle on record = Yes in Magic

## See Also
[UIController GoToNextRowAfterLastControl](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_GoToToNextRowAfterLastControl.htm)
