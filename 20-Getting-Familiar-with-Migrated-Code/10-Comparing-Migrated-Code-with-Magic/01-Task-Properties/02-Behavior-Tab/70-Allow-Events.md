﻿keywords: Task Properties, Behavior Tab, Allow events,AllowUserAbort

Name in migrated code: **AllowUserAbort**  
Location in migrated code: **OnLoad**


![](allowevents.png)

## Migrated Code Example

The **Batch Tasks** group is enabled in a BusinessProcess class (Batch task)

```csdiff   
protected override void OnLoad()
{
+    AllowUserAbort = true;
}
```        
Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     AllowUserAbort = ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR";
}
```        



## Property Values
True or false. The default is **false** which is Allow events = No in Magic


