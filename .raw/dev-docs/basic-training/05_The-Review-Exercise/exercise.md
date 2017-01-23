### The Big Review
1.	Create a new folder under Northwind – "SummaryExercise"
2.	Create a screen Show Orders (based on the Orders table)
    a.	Display a grid with the following columns from the Orders table:
        i. OrderId
        ii. OrderDate
        iii. ShipVia
        iv. ShipName
        v.	EmployeeId
        vi. ShipCity
    b.	Filter the Ship City to London
    c.	Add a relation to the employees table and connect it to the main table (Orders) by the EmployeeId column.
    d.	Add a method named "GetEmployeeName" that returns the full name of the employee as Text and use it to display the employee bane next to the employee id on the screen.
    e.	Using the GetValue method of the entity, get the CompanyName value from the shippers table based on the ShipVia column from the Orders table and display it on the screen, next to the ShipVia column.
    f.	Order by the Order Date
    g.	Add Selection list for the ShipVia columns to select a shipperId from the Shippers table.
    h.	Add InputValidation and display an error message if the OrderId is empty.
    i.	Display a warning message if the ShipName is empty.
    j.	Add a button to Print a report of all the orders and group by the ShipCity
3.	Create a Sub Form for the Orders -> Order Details 
    a.	Display a grid with all the columns from the OrderDetails table.
    b.	Bind the color of quantity greater than 5 to be red
    c.	Add selection list for the ProductId columns to select a productId from the Products table.
    d.	Add expression based column that shows the row total value which is the Quantity time the UnitPrice minus the Discount.
    e.	Add InputValidation and display an error message if the ProductId is empty.
    f.	Add a warning message if the Quantity is 0.
4.	Using the Entity methods in the ShowOrders program:
    a.	Add a button to add Chai to the current order, only if the order does not contains it already.
    b.	Add a button to remove the Chai from the current order.
    c.	Add a button to display a message box with the number of items in the current order.
5.	Create a Master-Detail Category -> Products (SubForm)
    a.	order by CategoryID
    b.	Add relations to get the name of the supplier and display on the table.
    c.	Bind the color of the UnitPrice to be red if the UnitStock is higher than 50
    d.	Selection task for Suppliers
    e.	Add a button to display Total Products per Category.
    f.	Print a report of all the products group by category.
