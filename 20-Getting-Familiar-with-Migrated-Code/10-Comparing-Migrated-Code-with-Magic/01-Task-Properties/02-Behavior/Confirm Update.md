keywords: Task Properties, Behavior Tab, Confirm update

![](Confirm.png)

## Migrated Code Example
```csdiff   
protected override void OnLoad()
{
+    ConfirmUpdate = true;
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindConfirmUpdate(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
+     BindConfirmDelete(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        



## Property Values
True or false. The default is **false** which is Confirm Update = No in Magic

