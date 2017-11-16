keywords: Task Properties, Behavior Tab, Force,Force Record suffix, Force Save

Name in migrated code: **ForceSaveRow**  
Location in migrated code: **OnLoad**


![](ForceRecordSuffix.png)

## Migrated Code Example
```csdiff   
protected override void OnLoad()
{
+    ForceSaveRow = true;
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindForceSaveRow(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        



## Property Values
True or false. The default is **false** which is Force record suffix = No in Magic

## See Also
[UIController ForceSaveRow](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_ForceSaveRow.htm)

