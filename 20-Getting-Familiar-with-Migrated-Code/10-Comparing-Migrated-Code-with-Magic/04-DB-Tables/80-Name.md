keywords: Datasource, Model , Table, EntityName


Name in Migrated Code: **EntityName**  
Location in Migrated Code: **OnLoad Method** 

![](2017-11-28_15h16_00.png)

## Migrated Code Example 

Example:
```csdiff
protected override void OnLoad()
{
+  Customers.EntityName = "%PATH%FileName";
};
```



