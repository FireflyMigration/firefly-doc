keywords: Task Properties, Options Tab, Create, Allow Create

Name in migrated code: **AllowDelete**  
Location in migrated code: **OnLoad**

![Delete](Delete.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowDelete = false;
}
``` 

    



## Property Values
True or false. The default is **True** which is Allow Delete = Yes in Magic
       