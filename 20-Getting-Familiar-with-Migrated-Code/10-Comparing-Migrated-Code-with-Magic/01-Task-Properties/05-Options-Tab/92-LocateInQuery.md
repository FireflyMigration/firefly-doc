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

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindAllowIncrementalSearch(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        
    



## Property Values
True or false. The default is **True** which is Allow Locate in query = Yes in Magic


---
**See Also**  
[AllowIncrementalSearch ](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_AllowIncrementalSearch.htm)  
[BindAllowIncrementalSearch ](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_BindAllowIncrementalSearch.htm)

---     