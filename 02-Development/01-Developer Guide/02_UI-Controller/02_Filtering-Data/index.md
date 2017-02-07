keywords:where,range
# UIController - Filtering Data

```csdiff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+        Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
+            Orders.ShipCity.IsEqualTo("Madrid")));
+        Where.Add(Orders.ShipName.IsDifferentFrom(""));
    }
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/4RdbTuXP5Sc?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>