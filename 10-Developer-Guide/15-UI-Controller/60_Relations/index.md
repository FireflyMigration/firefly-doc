keywords:relation,link
In this article we'll:
* Add a relation to the Shippers table
* Mention the different RelationTypes
* Use that relation to get the CompanyName of the shipper in ShipVIA
* Explain the recompute, when we change the shipVIA  - the CompanyName will be recomputed
* Explain that you can use the `rel` snippet to create the relation using the wizard

```csdiff
public readonly Models.Orders Orders = new Models.Orders();
+public readonly Models.Shippers Shippers = new Models.Shippers();
public ShowOrders()
{
    From = Orders;
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(
        Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.ShipName.IsDifferentFrom(""));

    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

+   Relations.Add(Shippers, RelationType.Find, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
}
    
```
Notes:
* To duplicate the control on the grid, we drag the control while holding the <kbd>Ctrl </kbd> key

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/6X7M-PbloU4?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>


For more information about the different relation types see:
[RelationTypes](/reference/html/T_Firefly_Box_RelationType.htm)