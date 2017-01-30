### Reevaluation Mechanism
1.	Columns in the columns collection are part of the reevaluation mechanism.
2.	The **order of the columns** is important for the reevaluation of related data. In other words, columns of a related table should be added to the columns collection after the columns that the relation depends on (usually the related columns from the main entity).
3.	In “ShowOrders” move the “Shippers.ShipperID” column to the beginning of the columns collection.
4.	Run the program and notice that now the relation does not reevaluated, as the user change the code - shipVia. Only when the user enters the row again.
5.	Return the “Shippers.ShipperID” column to the correct location.
6.	For more information, see the Columns property of the UIController class in the documentation.
```csdiff
public ShowOrders()
{
    From = Orders;
    Relations.Add(Shippers, RelationType.Find,Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
    Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid")));
    Where.Add(Orders.OrderDate.IsGreaterThan(1990,1,1));
    OrderBy.Add(Orders.ShipCity);
    OrderBy.Add(Orders.OrderDate, SortDirection.Descending);

-    Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
+    Columns.Add(Shippers.ShipperID,Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia,  Shippers.CompanyName);            
}
```
d.	Run the program and notice that now the relation does not reevaluated, as the user change the code - shipVia. Only when the user enters the row again.
e.	Return the “Shippers.ShipperID” column to the correct location.
```
-    Columns.Add(Shippers.ShipperID,Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia,  Shippers.CompanyName);            
+    Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
}
```
f.	For more information, see the Columns property of the UIController class in the documentation.
