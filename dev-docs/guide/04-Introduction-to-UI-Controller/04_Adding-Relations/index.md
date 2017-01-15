# Adding Relations
1.	Add a simple relation to another table (See screenshot).
      1. Start by adding the table definition.
      2. Then call to the Relations.Add method after the line that sets the From property
```diff
public readonly Models.Orders Orders = new Models.Orders();
public readonly Models.Shippers Shippers = new Models.Shippers();

public ShowOrders()
{
    From = Orders;
+   Relations.Add(Shippers, RelationType.Find,Shippers.ShipperID.IsEqualTo(Orders.ShipVia));
-   OrderBy = Orders.SortByOrderDate;
}
```
2.	## explain the different relation types##
2.  ## explain the find is the default so we don't have to write it##
3. ## explain that if we want to specify an index - we need to specify is as the last parameter.
3. Build before going to the form designer.
3.	Widen the ShipVia column and add a TextBox to the same column and set its data to the CompanyName column from the Shippers table. (Note: you can clone the existing textbox, by dragging it, while holding the CTRL key).
![Show Orders](ShowOrders.png)
4.	Run the application and observe the screen with the related data.
5.	Notice that when you change the ShipVia code value, the relation gets the appropriate CompanyName automatically (recompute of a relation). Note: press CTRL+F2 to cancel (like uniPaaS).
7.	Exercise: Adding Relations

### Relation Types - not sure if still relevant in this part of the document!!!!!

1.	Notice that the Relations.Add method has more options to add other kinds of relations such as Join, Insert, and InsertIfNotFound (called write in Magic).
These relation types will be discussed later and they are also well explained in the documentation and other resources, which mentioned in the student's workbook.
