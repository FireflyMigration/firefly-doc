keywords: Datasource, Model , Table, Access, Read, Write

## Read 
Name in Migrated Code: **ReadOnly** / **AllowRowLocking** 
Location in Migrated Code: **Class** (in Model region)  

![](2017-11-28_15h01_43.png)  


## Migrated Code Example 

Example Read:
```csdiff
readonly Models.Customers Customers = new Models.Customers 
{ 
+        ReadOnly = true 
};
```

Example Write:
```csdiff
readonly Models.Customers Customers = new Models.Customers 
{ 
+        AllowRowLocking = true
};
```

## Property Values

| Magic Name | Migrated Code Name      |
|------------|-------------------------|
| Write      | AllowRowLocking         |
| Read       | ReadOnly                |

The default is Access = Write in Magic

## See Also :
* [ReadOnly Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Data_Entity_ReadOnly.htm) 
* [AllowRowLocking Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Data_Entity_AllowRowLocking.htm) 



