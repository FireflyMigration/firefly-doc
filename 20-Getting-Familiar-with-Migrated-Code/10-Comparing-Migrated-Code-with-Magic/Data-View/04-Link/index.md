keywords: link,relations  
Name in the Migrated Code **Relations.Add Method**  
Location in the Migrated code **InitializeDataView Method**  

***

Example:  

```csdiff
 public ShowOrders()
 {
    From = Orders;
+   Relations.Add(Shippers, RelationType.Find, Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
 }
```

 See also:  [Relations](Relations.html)

