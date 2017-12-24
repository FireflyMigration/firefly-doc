keywords: Task Properties, Options Tab, Index change, 

Name in migrated code: **AllowSelectOrderBy**  
Location in migrated code: **OnLoad**


![Index Change](IndexChange.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowSelectOrderBy = false;
}
``` 

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     AllowSelectOrderBy = ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR";
}
```        
    



## Property Values
True or false. The default is **True** which is Allow Index change = Yes in Magic