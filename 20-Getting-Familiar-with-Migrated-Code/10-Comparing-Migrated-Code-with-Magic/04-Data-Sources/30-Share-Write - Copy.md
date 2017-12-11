keywords: Datasource, Model , Table, Share, Write


Name in Migrated Code: **FileSharing**  
Location in Migrated Code: **Class** (in Model region)  

![](2017-11-28_16h05_24.png)

## Migrated Code Example 

Example:
```csdiff
internal readonly Models.Customers Customers = new Models.Customers
{ 
+        FileSharing = ENV.Data.DataProvider.BtrieveFileSharing.Write 
};
```

## Note :
Share =Write is the default value

