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





## Feedback and issues	
This project is a work in progress, intended to improve the way we all write Sql code - your feedback is critical to it's success
If you have:
1. Suggestions
2. Bugs
3. Sql's that you don't know how to express with this syntax
4. Any other related comment

Please open an issue for it in the [project's github repo](https://github.com/fireflymigration/easysql/issues)

<iframe width="560" height="315" src="https://www.youtube.com/embed/B5dxPrl4c4I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>