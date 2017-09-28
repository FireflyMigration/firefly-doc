In the DataApi class

```csdiff
static DataApiController()
{
    _dataApi.Register(typeof(Northwind.Models.Categories));
-   _dataApi.Register(typeof(Northwind.Models.Orders));
+   _dataApi.Register(typeof(Northwind.Models.Orders), true);
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/acf3d1e160bddbbb6e1e56a743cffd4aab9579d6)



<iframe width="560" height="315" src="https://www.youtube.com/embed/o38r7wQ64IM?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>