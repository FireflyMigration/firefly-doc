keywords: Datasource, Model , Table, Cached


Name in Migrated Code: **Cached**  
Location in Migrated Code: **Class** (in Model region)

![](2017-11-28_15h19_18.png)

## Migrated Code Example 

Example cache = No:
```csdiff
internal readonly Models.Customers Customers = new Models.Customers 
{ 
+    Cached = true
};
```
## Property Values
True or false. The default is **false** which is Cached = Yes in Magic

## See Also :
* [Cached Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Data_Entity_Cached.htm)
