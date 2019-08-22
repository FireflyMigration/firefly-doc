keywords:dynamicSqlEntity,DirectSQL,Direct SQL, Dynamic SQL,easy sql

Previously when you wanted to use a `DynamicSqlEntity` you've written it's sql as a string, for example:
```csdiff
var sqlEntity = new DynamicSQLEntity(Shared.DataSources.Northwind,
    @"Select t1.CustomerID, t1.CompanyName 
        from dbo.Customers t1 
        Where (t1.City = ':1')");
sqlEntity.AddParameter(() => "London");
```

Now, using EasySql, you can write it in CSharp like this:
```csdiff
var c = new Models.Customers();
var sqlEntity = new DynamicSQLEntity(Shared.DataSources.Northwind,
    Select(c.CustomerID, c.CompanyName)
    .From(c)
    .Where(c.City.IsEqualTo("London")));

```

## What is the difference?
Well, in the first example we write the SQL as a string, in the second example we write using C#, and the EasySql class generates the string for us, this has the following advantages:
* It uses your existing Entity classes, so you'll always get the table and column names right as you are used to seeing them in your code.
* When you'll try to find all references of an Entity or a Column, you'll find these sqls (in a string it would never find it).
* You'll avoid making "stupid" syntax errors, since C# will keep you safe.
* You'll be able to refactor your sql statements, making it easy to write complex sql expressions, with one line of code.
* Use a syntax that is similar to SQL but is a lot easier with little or no repetition
* You can reduce your dependency on specific SQL syntax, making it easier to move from oracle to sql or similar
* You can use the existing filter syntax you are used to from migrated code.



## Adding EasySql to an Existing Projects
Simply download the [EasySql](https://raw.githubusercontent.com/FireflyMigration/EasySql/master/ENV/Utilities/EasySql.cs) file and add it to the `ENV` project under tyhe `Utilities` folder.


