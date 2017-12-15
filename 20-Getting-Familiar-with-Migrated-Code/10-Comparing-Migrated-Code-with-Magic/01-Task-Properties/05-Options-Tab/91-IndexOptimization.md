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

    



## Property Values
True or false. The default is **True** which is Allow Sorting = Yes in Magic