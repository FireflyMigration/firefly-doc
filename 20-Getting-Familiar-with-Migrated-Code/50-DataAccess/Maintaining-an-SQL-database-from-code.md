keywords:AutoCreate, Alter table, Iterate entities,iterate all entities

In our code, we have the definitions of the entities we need in our SQL database, why not have the code create these tables for us.

There are several options to do that.
## AutoCreate
By setting the `AutoCreate` property to true, in our entities, in every controller, before we access an this `Entity`, the code will first check if it exists, and if not it'll create it.

It'll also create any index that exists in this entity, for which the `AutoCreate` property of the index is set to true.

This works exactly as it did in the original application, but it has a performance cost of checking that the table exists, many many times.

## Creating the table ourselves

We can easily call the code that creates the table, by using the `CreateTable` method of the database.
```csdiff
Shared.DataSources.Northwind.CreateTable(new Models.Orders());
```

We can also check first if the table exists, and only create it in that case:
```csdiff
var o = new Models.Orders();
if (!o.Exists())
    Shared.DataSources.Northwind.CreateTable(o);
```

## Adding a column to an existing table
Many times during our development we are adding columns, and we need to apply this change to the sql database we use.
For that we have the `AddColumn` method in the `EntityScriptGenerator` class
> if you have an older version of ENV, you can see the changes we've done to add this method at: [Files after change](https://gist.github.com/noam-honig/a30723a99dda4f20a91527026f3e5f50) or [View changes](https://gist.github.com/noam-honig/a30723a99dda4f20a91527026f3e5f50/revisions)
> We've only made minor changes to `GetDefintion.cs` and a several more changes to the `SqlScriptGenerator.cs` file.


```csdiff
EntityScriptGenerator.AddColumn(new Models.Orders().Freight);
```

## A list of similar useful methods
* AddColumn - Executes an Alter Table script
* AddColumnIfNotFound - Executes an Alter Table script only if the column does not exist
* AddIndex - Adds an index to a table
* AddIndexIfNotFound - Adds an index, only if the index does not exist.

## VerifyEntityStructure
The `VerifyEntityStructure` method checks if an Entity exist.
* If it doesn't exist it creates it.
* If the Entity exists, it'll check for each column and index if it exists and if not, it'll add it to. 

This method makes sure that the database structure matches the Entity.

Here's how to use it:
```csdiff
EntityScriptGenerator.VerifyEntityStructure(new Models.Orders());
```

## Iterating all the Entities in our ApplicationEntities class:
```csdiff
foreach (var item in Application.Instance.AllEntities._entities)
{
    ENV.Data.Entity e = null;
    try
    {
        e = System.Activator.CreateInstance(item.Value) as ENV.Data.Entity;
    }
    catch { }
    if (e != null && e.DataProvider is DynamicSQLSupportingDataProvider)
    {
        EntityScriptGenerator.VerifyEntityStructure(e);
    }
}
```
## Iterating all Entity in all our Assemblies

```csdiff
void DoOnAssembly(System.Reflection.Assembly ass)
{
    foreach (var item in ass.GetTypes())
    {
                        
        if (typeof(ENV.Data.Entity).IsAssignableFrom(item))
        {
            ENV.Data.Entity e = null;
            try
            {
                e = System.Activator.CreateInstance(item) as ENV.Data.Entity;
            }
            catch { }
            if (e != null && e.DataProvider is DynamicSQLSupportingDataProvider)
            {
                EntityScriptGenerator.VerifyEntityStructure(e);
            }
        }
    }
    foreach (var reference in ass.GetReferencedAssemblies())
    {
        System.Reflection.Assembly a;
        try
        {
            if (reference.Name.StartsWith("ENV") || reference.Name.StartsWith("Firefly.") || reference.Name.StartsWith("System."))
                continue;
            a = System.Reflection.Assembly.Load(reference);
        }
        catch
        {
            continue;
        }
        DoOnAssembly(a);
    }
}
DoOnAssembly(System.Reflection.Assembly.GetEntryAssembly());
```

