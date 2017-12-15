keywords: Task Properties, Behavior Tab, Confirm Cancel,Confirm undo

Name in migrated code: **ConfirmUndo**  
Location in migrated code: **OnLoad**


![](confirmcancel.png)

## Migrated Code Example
```csdiff   
protected override void OnLoad()
{
+    ConfirmUndo = true;
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindConfirmUndo(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        



## Property Values
True or false. The default is **false** which is Confirm Cancel = No in Magic

