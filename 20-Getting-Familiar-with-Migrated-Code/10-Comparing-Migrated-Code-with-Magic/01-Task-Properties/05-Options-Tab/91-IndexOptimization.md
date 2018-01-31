keywords: Task Properties, Options Tab, Index optimization, 

Name in migrated code: **SortOnIncrementalSearch**  
Location in migrated code: **OnLoad**

![Index Optimization](IndexOptimization.png)

## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    SortOnIncrementalSearch = false;
}
``` 

Condition as an expression:

```csdiff   
protected override void OnLoad()
{
+     BindSortOnIncrementalSearch(() => ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR");
}
```        
    



## Property Values
True or false. The default is **True** which is Allow Sorting = Yes in Magic


---
**See Also**  
[SortOnIncrementalSearch ](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_SortOnIncrementalSearch.htm)  
[BindSortOnIncrementalSearch ](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_BindSortOnIncrementalSearch.htm)

---    