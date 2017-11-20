keywords: Task Properties, Options Tab, Locate, Allow Locate

Name in migrated code: **AllowFindRow**  
Location in migrated code: **OnLoad**


![Locate](Locate.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowFindRow = false;
}
``` 

    



## Property Values
True or false. The default is **True** which is Allow Locate = Yes in Magic