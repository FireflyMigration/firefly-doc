keywords: Datasource, Model , Table, Open, Normal


Name in Migrated Code: **OpenMode**  
Location in Migrated Code: **Class** (in Model region)  

![](2017-11-28_16h18_05.png)

## Migrated Code Example 

Example:
```csdiff
internal readonly Models.Customers Customers = new Models.Customers
{ 
+        OpenMode = ENV.Data.DataProvider.BtrieveOpenMode.Normal
};
```

## Note :
Open = Normal is the default value. Relevant only for Btrieve

