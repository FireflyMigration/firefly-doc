keywords: Datasource, Model , Table, Open, Normal, Reindex


Name in Migrated Code: **OpenMode**  
Location in Migrated Code: **Model Initializer** 

![](2017-11-28_16h23_05.png)

## Migrated Code Example 

Example:
```csdiff
internal readonly Models.Customers Customers = new Models.Customers
{ 
+        OpenMode = ENV.Data.DataProvider.BtrieveOpenMode.Normal
};
```  

## Property Values

| Magic Value| Migrated Code Value     |
|------------|-------------------------|
| Normal     | BtrieveOpenMode.Normal  |
| Reindex    | BtrieveOpenMode.Reindex |

The default is BtrieveOpenMode.Normal

## Note :
Relevant only for Btrieve

