keywords:version update,DatabaseUpgradeBase 

Often, when we deploy a new version to our customers, we need also to update the database with all the changes that we've made to it, either add columns etc...
Many times we try to do that by running many scripts, and that can get messy as it progresses.

The `DatabaseUpgradeBase` class is designed to create and manage a clear database Upgrade path.

Let's see how it's used.

First we'll add a new class to our project, and call it `DatabaseUpgrade`
```csdiff
using ENV.Utilities;
using Northwind.Shared;

namespace Northwind
{
   class DatabaseUpgrade:DatabaseUpgradeBase
    {
        public DatabaseUpgrade():base(DataSources.Northwind)
        {
        }
        protected override void BuildSteps()
        {
            
        }
    }
}
```
Next we can steps to the Upgrade process, each step will a number and the Business Logic we want it to run.
```csdiff
protected override void BuildSteps()
{
+   Step(1, () => DataSources.Northwind.CreateTable(new Models.Products()));    
}
```
For example, this step creates the `Products` entity in the database.

* Each step requires a unique consecutive number (1,2,3...34,35 etc...)
* We can also add a description for that step as the 3rd parameter.


We can also run normal logic, not just database logic, for example:
```csdiff
protected override void BuildSteps()
{
    Step(1, () => DataSources.Northwind.CreateTable(new Models.Products()));
+   Step(2, () =>
+   {
+       var p = new Models.Products();
+       p.Insert(() =>
+       {
+           p.ProductID.Value = 1;
+           p.ProductName.Value = "Default Product";
+       });
+   });
}
```
This step - will insert a new row to the products table.

Here's another example:
```csdiff
protected override void BuildSteps()
{
    Step(1, () => DataSources.Northwind.CreateTable(new Models.Products()));
    Step(2, () =>
    {
        var p = new Models.Products();
        p.Insert(() =>
        {
            p.ProductID.Value = 1;
            p.ProductName.Value = "Default Product";
        });
    });
+   Step(3, () =>
+   {
+       var p = new Models.Products();
+       p.ForEachRow(() =>
+       {
+           p.UnitPrice.Value *= 2;
+       });
+   });
}
```
In step 3 we duplicate all unit prices.

We recommend that you'll review the [Maintaining an SQL database from code](maintaining-an-sql-database-from-code.html) to see ways for automatically generating the sql scripts you need to add tables, columns etc...

## How do we run it?
```csdiff
new DatabaseUpgrade().Run();
```
## How does it work?
* It keeps a table in the database with the last step that was successful
* It compares the database last successful step with the steps in the code, and runs each step that was not yet successful
* If a step fails, it'll throw an exception.

> If you are running an older version of ENV and want the code for `DatabaseUpgrade.cs` you can [download it here](https://gist.github.com/noam-honig/ca5f841206c8ce082f1e75871e893c2a)