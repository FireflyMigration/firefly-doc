We use a UnitTests to test the EasySql functionality.

The strategy we chose is that in every test we'll include the original Sql and the Sql produced by the `EasySql` - run both queries and compare them.

For example, here's a basic test from our tests suite
```csdiff
[TestMethod]
public void SQLWithAnd()
{
    var c = new Models.Customers();
    Verify(
        Select(c.CustomerID).From(c).
        Where(c.Country.IsEqualTo("Germany").And(c.City.IsEqualTo("Berlin")))
        ,
        @"SELECT CustomerID FROM Customers
            WHERE Country = 'Germany' AND City = 'Berlin'; "
        );
}
```

In lines 9-10 you can see the original sql.

In lines 6-7 you can see that sql expressed in C#.
When we run the tests - it runs both queries, compares their results and if the results are not identical the test fails

You are welcome to contribute tests - we will do our best to fix them.

To see all tests see our [automatic tests on Github](https://github.com/FireflyMigration/EasySql/blob/master/TestEasySql/UnitTest1.cs)