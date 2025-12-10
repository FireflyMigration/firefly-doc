keywords: Task Properties, Behavior Tab, Force,Force Record delete, Force Delete

Name in migrated code: **DeleteRowAfterLeavingItIf**  
Location in migrated code: **OnLoad**

![](ForceRecordDelete.png)

## Migrated Code Example
```csdiff   
protected override void OnLoad()
{
+    DeleteRowAfterLeavingItIf(() => true);
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     DeleteRowAfterLeavingItIf(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        



## Property Values
True or false. The default is **false** which is Force record delete = No in Magic

## See Also
[UIController DeleteRowAfterLeavingItIf](/reference/html/M_Firefly_Box_UIController_DeleteRowAfterLeavingItIf.htm)

