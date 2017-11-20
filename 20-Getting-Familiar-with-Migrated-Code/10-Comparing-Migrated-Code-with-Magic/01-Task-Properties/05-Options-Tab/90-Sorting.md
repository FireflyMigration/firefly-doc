keywords: Task Properties, Options Tab, Index change, 

Name in migrated code: **AllowCustomOrderBy**  
Location in migrated code: **OnLoad**

![Sorting](Sorting.png)


## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    AllowCustomOrderBy = false;
}
``` 

    



## Property Values
True or false. The default is **True** which is Allow Sorting = Yes in Magic