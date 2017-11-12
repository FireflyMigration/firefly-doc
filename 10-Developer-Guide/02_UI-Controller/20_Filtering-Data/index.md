keywords:where,range

In this article we'll:
* Show only Orders with ShipCity = London
* Show the different condition types: IsEqualTo, IsGreaterThan etc...
* Explain that using `Where.Add` twice results in an 'And' relationship
* Demo 'Or'


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
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
        Where.Add(Orders.ShipCity.IsEqualTo("London"));
+       Where.Add(Orders.ShipName.IsDifferentFrom(""));
    }
}
```
#### demo 'Or'
```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
+           Orders.ShipCity.IsEqualTo("Madrid")));
        Where.Add(Orders.ShipName.IsDifferentFrom(""));
    }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/4RdbTuXP5Sc?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>


See also: [Other types of where](other-types-of-where.html)