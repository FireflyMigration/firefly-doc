keywords: Task Properties, Options Tab, Create, Allow Create

Name in migrated code: **AllowInsert**  
Location in migrated code: **OnLoad**


![Create](Create.png)
## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowInsert = false;
}
``` 

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindAllowInsert(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        
    



## Property Values
True or false. The default is **True** which is Allow Create = Yes in Magic
       

---
**See Also**  
[AllowInsert ](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_AllowInsert.htm)  
[BindAllowInsert ](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_BindAllowInsert.htm)

---   