# Exercise - Selection List

1. Add new folder under the Exervicises folder, name the new folder **SelectionList**.
2. Add new UIController to the **SelectionList** folder, name the new UIController **ShowOrdersWithEmployeeSelection**. 
3. Set the **Orders** table as the main table 
4. Build and go to the form designer.
5. Add a **Grid control** to the form.
6. Add the following columns to the **Grid**:  
   1. Orders.OrderID.  
   2. Orders.CustomerID.
   3. Orders.OrderDate.
9. Add new UIController to the **SelectionList** folder, name the new UIController **SelectEmployees**. 
10. Set the **Employee** table as the main table
11. In the Onload method set the following settings
	1. Activity to Browse.
	2. Allow Delete,Insert and update to false.
	3. Allow Select to true.

11. Build and go to the form designer.
12. Add a **Grid control** to the form.
13. Add the following columns to the **Grid**
   1. Employees.EmployeeID.  
   2. Employees.FirstName.
   3. Employees.LastName.
14. Set a Debug Write line in the On Saving row and make sure that you get the message in the output window when selecting an item
16. Save changes to Git.
17. Build and test.
