Sometimes you may want to add your own custom Sql functions that will do whatever it is you want them to do.

Let's start with a basic query:
```csdiff
var c = new Models.Products();
Shared.DataSources.Northwind.TestSql(
    Select(
        c.ProductID,
        c.ProductName,
        c.UnitPrice
    )
    .From(c));

```

### Adding custom Sql Syntax 
Let's say that we want to add a fixed tax to all UnitPrices and there is no prepared sql to do that.
The first thing you can do is use the `SqlPart` class.
```csdiff
 var c = new Models.Products();
Shared.DataSources.Northwind.TestSql(
    Select(
        c.ProductID,
        c.ProductName,
-       c.UnitPrice
+       new  ENV.Utilities.SqlPart(c.UnitPrice," * 1.1") 
    )
    .From(c));
```


That'll do the trick whenever you need some sql syntax and can't find a build in solution.
### Reusing custom Sql Syntax

You can create your own SQL method that can be used all over your code, simply create our own class and add the methods to it.

For example, let's add our customer `MySqlFunctions` class:
```csdiff
public static class MySqlFunctions
{
    public static SqlPart AddTax(NumberColumn column)
    {
        return new SqlPart(column, " * 1.1");
    }
}
```

And in our code, we'll just add a using statement for it and use it
```csdiff
using static ENV.Utilities.EasySql;
using ENV.Utilities.EasySqlExtentions;
+using static Northwind.MySqlFunctions;
...
 var c = new Models.Products();
Shared.DataSources.Northwind.TestSql(
    Select(
        c.ProductID,
        c.ProductName,
-       new  ENV.Utilities.SqlPart(c.UnitPrice," * 1.1")
+       AddTax(c.UnitPrice)
    )
    .From(c));
```

### Examples	
For more examples go to the `EasySql` and see how we've implemented many functions suchh as `IsIn`, `Count`, `Average` etc...