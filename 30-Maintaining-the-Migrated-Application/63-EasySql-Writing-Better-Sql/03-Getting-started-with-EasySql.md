To start using `EasySql` add the following `using` statements at the top of your `cs` file
```csdiff
using static ENV.Utilities.EasySql;
using ENV.Utilities.EasySqlExtentions;
```

## Select
The most basic sql will start with look like this:
```csdiff
var c = new Models.Customers();
Select(c.CustomerID, c.CompanyName)
.From(c)
```

### From is not always required
Since the table can be inferred by the column that is being used, if you don't specify the from, it'll infer the entities from the used columns
```csdiff
var c = new Models.Customers();
Select(c.CustomerID, c.CompanyName)
```

### Where
```csdiff
var c = new Models.Customers();
Select(c.CustomerID, c.CompanyName)
.Where(c.Country.IsEqualTo("USA"))
```

### Inner Join
```csdiff
var c = new Models.Customers();
+var o = new Models.Orders();
Select(c.CustomerID, c.CompanyName)
+   .From(c)
+   .InnerJoin(o,o.CustomerID.IsEqualTo(c.CustomerID))
.Where(c.Country.IsEqualTo("USA"))

```

### Group By
var c = new Models.Customers();
Select(c.City, Count())
    .From(c)
    .Where(c.Country.IsEqualTo("USA"))
    .GroupBy(c.City)


### See our Unit Tests
> For more great examples see our [automatic tests](https://github.com/FireflyMigration/EasySql/blob/master/TestEasySql/UnitTest1.cs)
> We'll be happy if you'll add some of your own test there