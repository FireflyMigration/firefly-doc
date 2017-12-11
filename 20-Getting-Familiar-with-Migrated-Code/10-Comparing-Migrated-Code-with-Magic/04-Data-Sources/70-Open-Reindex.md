keywords: Datasource, Model , Table, Open, Reindex


Name in Migrated Code: **OpenMode**  
Location in Migrated Code: **Class** (in Model region)  

![](2017-11-28_16h23_05.png)

## Migrated Code Example 

Example:
```csdiff
internal readonly Models.Customers Customers = new Models.Customers
{ 
+        OpenMode = ENV.Data.DataProvider.BtrieveOpenMode.Reindex
};
```

## Note:

Relevant only for Btrieve