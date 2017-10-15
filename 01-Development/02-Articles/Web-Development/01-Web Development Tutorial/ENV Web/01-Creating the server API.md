# Creating the Server Api's

in the 'Controllers\DataApiController.cs', will add an api for `Orders`, `OrderDetails`, `Customers`, `Shippers` and `Products`:
```csdiff
public class DataApiController : Controller
{
    static DataApi _dataApi = new DataApi();
    static DataApiController()
    {
        _dataApi.Register(typeof(Northwind.Models.Categories),true);
+       _dataApi.Register(typeof(Northwind.Models.Orders));
+       _dataApi.Register(typeof(Northwind.Models.Order_Details));
+       _dataApi.Register(typeof(Northwind.Models.Customers));
+       _dataApi.Register(typeof(Northwind.Models.Shippers));
+       _dataApi.Register(typeof(Northwind.Models.Products));
    }
    // GET: DataApi
    public void Index(string name, string id = null)
    {
        _dataApi.ProcessRequest(name, id);
    }
}
```

### Build and go to the browser, under `dataApi/` we'll see all the added apis.
![2017 10 13 08H07 25](../2017-10-13_08h07_25.gif)
### Let's rename the `order_details` api to `orderDetails`:
```csdiff
_dataApi.Register(typeof(Northwind.Models.Categories),true);
_dataApi.Register(typeof(Northwind.Models.Orders));
-_dataApi.Register(typeof(Northwind.Models.Order_Details));
+_dataApi.Register("orderDetails",typeof(Northwind.Models.Order_Details));
_dataApi.Register(typeof(Northwind.Models.Customers));
_dataApi.Register(typeof(Northwind.Models.Shippers));

```
