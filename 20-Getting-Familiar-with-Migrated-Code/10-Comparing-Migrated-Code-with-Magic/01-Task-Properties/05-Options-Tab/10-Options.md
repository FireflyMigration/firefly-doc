keywords: Task Properties, Options Tab, Options, Allow options 

Name in migrated code: **AllowActivitySwitch**  
Location in migrated code: **OnLoad**


![Options](Options.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowActivitySwitch = false;
}
``` 

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindAllowActivitySwitch(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        

    



## Property Values
True or false. The default is **True** which is Allow Options = Yes in Magic


---
**See Also**  
[AllowActivitySwitch ](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_AllowActivitySwitch.htm)  
[BindAllowActivitySwitch ](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_BindAllowActivitySwitch.htm)

---             