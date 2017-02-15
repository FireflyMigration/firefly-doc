keywords:where,range,range expression, sql where,DB sql,magic sql,dynamic where



### basic condition
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(Orders.ShipCity.IsEqualTo("London"));
    }
}
```

### Using or
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
+           Orders.ShipCity.IsEqualTo("Madrid")));
    }
}
```

### Using an in memory expression
#### Example 1
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(() => Orders.ShipCity=="London");
    }
}
```
#### Example 2
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(() => Orders.ShipCity.Contains("o"));
    }
}
```

### SQL Where

```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add("{0} = {1}", Orders.ShipCity, "London");
    }
}
```

### SQL Where using prebuilt functions
#### Example 1
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(db.In(Orders.ShipCity, "London", "Madrid"));

    }
}
```
#### Example 2
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add("{0} = {1} or {2}", Orders.ShipCity, "London",db.In(Orders.ShipCity,"Madrid", "Berlin"));

    }
}
```