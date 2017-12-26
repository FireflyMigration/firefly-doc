keywords: Task Properties, Options Tab, Range, Allow Range

# Range

Name in migrated code: **AllowFilterRows**  
Location in migrated code: **OnLoad**


![Range](Range.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowFilterRows = false;
}
``` 

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     AllowFilterRows = ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR";
}
```        
    



## Property Values
True or false. The default is **True** which is Allow Range = Yes in Magic