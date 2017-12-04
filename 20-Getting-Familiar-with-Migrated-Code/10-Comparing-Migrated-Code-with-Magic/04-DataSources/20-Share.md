keywords: Datasource, Model , Table, Share, Write, Read, None


Name in Migrated Code: **FileSharing**  
Location in Migrated Code: **Class** (in Model region)  

![](2017-11-28_16h05_24.png)

## Migrated Code Example 

Example:
```csdiff
readonly Models.Customers Customers = new Models.Customers
{ 
+        FileSharing = ENV.Data.DataProvider.BtrieveFileSharing.Read 
};
```

## Property Values

| Magic Name | Migrated Code Name      |
|------------|-------------------------|
| Write      | Write                   |
| Read       | Read                    |
| None       | None                    |

The default is Share = Write in Magic



