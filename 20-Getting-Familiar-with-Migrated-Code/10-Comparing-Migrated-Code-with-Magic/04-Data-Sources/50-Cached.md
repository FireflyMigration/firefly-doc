keywords: Datasource, Model , Table, Cached

Name in Migrated Code: **Cached**  
Location in Migrated Code: **Model Initializer** 

![](2017-11-28_15h19_18.png)

## Migrated Code Example 

```csdiff
internal readonly Models.Customers Customers = new Models.Customers 
{ 
+    Cached = true
};
```
## Property Values
True or false. The default is **false** 

## See Also :
* [Cached Property](/reference/html/P_Firefly_Box_Data_Entity_Cached.htm)
