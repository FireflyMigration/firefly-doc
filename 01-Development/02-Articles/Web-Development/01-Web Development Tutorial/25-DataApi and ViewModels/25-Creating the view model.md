1. Create a new ViewModel based on the `ViewModelHelper` template in the ENV.Web Templates folder.

```csdiff
class OrdersViewModel : ViewModelHelper
{
+   public readonly Northwind.Models.Orders Orders = new Northwind.Models.Orders();

    public OrdersViewModel()
    {
+      From = Orders;
+      AllowUpdate = true;
    }
}
```

2. Register it with the DataApiController.cs

```csdiff
static DataApiController()
    {
        _dataApi.Register(typeof(Northwind.Models.Categories));
-       _dataApi.Register(typeof(Northwind.Models.Orders),true);
+       _dataApi.Register(typeof(ViewModels.OrdersViewModel));
        _dataApi.Register(typeof(Northwind.Models.Customers));

    }
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/a6af8069bf592e9f555006338d82f96d75979e24)

<iframe width="560" height="315" src="https://www.youtube.com/embed/PEtNfA0jvNE?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
