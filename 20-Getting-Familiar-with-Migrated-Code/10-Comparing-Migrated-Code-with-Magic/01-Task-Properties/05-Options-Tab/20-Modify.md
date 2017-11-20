keywords: Task Properties, Options Tab, Modify, Allow Modify, Update 

Name in migrated code: **AllowUpdate**  
Location in migrated code: **OnLoad**


![Modify](Modify.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowUpdate = false;
}
``` 

    



## Property Values
True or false. The default is **True** which is Allow Update = Yes in Magic
       