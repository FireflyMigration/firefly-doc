keywords: Task Properties, Options Tab, Locate in Query, Allow Locate

Name in migrated code: **AllowIncrementalSearch**  
Location in migrated code: **OnLoad**

![Locate In Query](LocateInQuery.png)


## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowIncrementalSearch = false;
}
``` 

    



## Property Values
True or false. The default is **True** which is Allow Locate in query = Yes in Magic