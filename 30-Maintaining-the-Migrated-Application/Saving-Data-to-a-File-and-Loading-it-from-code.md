keywords:save data, load data, generate sql insert script, export data, import data
In this article we review how to load and save data to a file from code.


<iframe width="560" height="315" src="https://www.youtube.com/embed/Y5zKI4tLRqg" frameborder="0" allowfullscreen></iframe>

## Saving the Data
```csdiff
var o = new Models.Orders();
var dataBytes = u.SerializeEntity(o);
u.Blb2File(dataBytes, @"c:\temp\orders.data");
```

#### Filter the data to be saved
```csdiff
var o = new Models.Orders();
-var dataBytes = u.SerializeEntity(o);
+var dataBytes = u.SerializeEntity(o,o.ShipCountry.IsEqualTo("France"));
u.Blb2File(dataBytes, @"c:\temp\orders.data");
```

#### Using a Table Name Expression
this code shows how to export data from a table that uses a table name expression, in this case we used a separate Ordres file per year.
```csdiff
var o = new Models.Orders();
+o.EntityName = "Orders_" + Date.Now.Year;
var dataBytes = u.SerializeEntity(o);
u.Blb2File(dataBytes, @"c:\temp\orders.data");
```

## Loading the Data
```csdiff
var o = new Models.Orders();
var dataBytes = u.File2Blb(@"c:\temp\orders.data");
u.DeserializeEntity(o, dataBytes);
```

## Using System.IO instead of File2Blb
#### Saving
```csdiff
var o = new Models.Orders();
var dataBytes = u.SerializeEntity(o);
-u.Blb2File(dataBytes, @"c:\temp\orders.data");
+File.WriteAllBytes(@"c:\temp\orders.data", dataBytes);
```
#### Loading
```csdiff
var o = new Models.Orders();
-var dataBytes = u.File2Blb(@"c:\temp\orders.data");
+var dataBytes =File.ReadAllBytes(@"c:\temp\orders.data");
u.DeserializeEntity(o, dataBytes);
```