using ENV.Web you can now easily save and load entity data to json.

First thing you'll need is to import the ENV.Web.dll which you can download from [here](https://github.com/FireflyMigration/ENV.Web/releases)

Next, add a using statement for the `ENV.Web.DataListHelpers` namesplaces.

Adding this namespace adds extention methods to entities making it easier to export them

# Export Entity Data to Json
```csdiff
var c = new Models.Orders();
File.WriteAllText(@"orders.json", c.ExportToJson());
```

### Filtering
You can also filter the data 
```csdiff
var c = new Models.Orders();
File.WriteAllText(@"orders.json", c.ExportToJson(c.ShipCity.IsEqualTo("London")));
```

You can also send an Order By if you want to.


# Import Entity Data from JSON
```csdiff
var c = new Models.Orders();
c.ImportFromJson(File.ReadAllText(@"orders.json"));
```


# Diving deeper
The `ExportToJson` and `ImportToJson` are simple wrap methods around the `ViewModel` class and the `DataList` class.
If you want to have more control over the JSON file and the import process, you are welcome to use the `ViewModel` class and have all the control that is detailed in other articles in this document.

Here's the code for the `ExportToJson` and `ImportFromJson` methods to explain how it all works.
```csdiff
public static string ExportToJson(this ENV.Data.Entity entity, FilterBase where = null, Sort orderBy = null, params ColumnBase[] columns)
{
    var vmc = new ViewModel
    {
        From = entity
    };
    if (where != null)
        vmc.Where.Add(where);
    if (orderBy != null)
        vmc.OrderBy = orderBy;
    return vmc.ExportRows().ToJson();
}
public static void ImportFromJson(this ENV.Data.Entity entity, string json, bool ignoreDuplicateRows = false)
{
    var vmc = new ViewModel { From = entity };
    var dl = DataList.FromJson(json);
    vmc.ImportRows(dl, ignoreDuplicateRows: ignoreDuplicateRows);
}
```