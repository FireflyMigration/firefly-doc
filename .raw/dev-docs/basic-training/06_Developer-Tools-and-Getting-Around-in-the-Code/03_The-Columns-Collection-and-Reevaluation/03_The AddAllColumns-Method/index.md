### The AddAllColumns Method
- The `AddAllColumns` method can be used to add all the columns from the main entity and related entities. The columns will be added in the same order as defined in the entity class.
- Call to the AddAllColumns method after the Columns.Add statement:
 ```diff
  Columns.Add(Orders.OrderID, Orders.OrderDate, Orders.ShipName, Orders.ShipCity, Orders.ShipVia, Shippers.ShipperID, Shippers.CompanyName);
+ AddAllColumns();
 ```
- Run the program and open the Output window to show that all the columns are selected, but the columns that were added to the columns collection manually are selected first.

- Note that if no columns are added to the columns collection, the `AddAllColumns` method will be **called implicitly** (This is what happened so far).

- In addition, any column that is on the screen or part of the primary key, will always be added to the columns collection (even if we haven't added them manually), but counting on this is bad practice, as the columns will be added at the end of the columns order.

Exercise: Reevaluation and AddAllColumns

