
In the DataApi class
```csdiff
static DataApiController()
{
    _dataApi.Register(typeof(Northwind.Models.Categories));
+   _dataApi.Register(typeof(Northwind.Models.Orders));
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/yQxqUUUTCog?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
