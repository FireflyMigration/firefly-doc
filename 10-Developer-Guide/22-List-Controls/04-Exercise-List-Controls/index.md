# Exercise - List Controls

1. Add new UIController to the Exercises folder, name the new UIController **ControlsDemo**. 
2. Set the Orders table as the main table 
3. Add **OrderID**, **ShipCountry** to a grid on the form.
4. Add 3 ComboBoxes to the grid. For each combobox you need to:  
   1. Add a column to the grid.  
   3. Place a ComboBox from the toolbox in the new column.
   2. Name the column:
      1. **Customer**.
      2. **Employee**.
      3. **Shipper**.
5. The 3 ComboBoxes will show data from :  
   1. CustomerID.
   2. EmployeeID.
   3. ShipVia.
6. Set the **Name** property of the 3 ComboBoxes to :
   1. cmbCustomer.
   2. cmbEmployee.
   3. cmbShipper.
7. In **ControlsDemo** controller define these 3 tables:  
   1. Customers.
   2. Employees.
   3. Shippers.
8. Go to the **code behind** of ControlsDemo form and set:
   1.  cmbCustomer ListSource to be customer table from the controller.
   2.  cmbCustomer ValueColumn to be CustomerID.
   3.  cmbCustomer DisplayColumn to be CompanyName.
   4.  cmbEmployee ListSource to be Employees table from the controller.
   2.  cmbEmployee ValueColumn to be EmployeeID.
   3.  cmbEmployee DisplayColumn to be LastName.
   7.  cmbShipper ListSource to be Shippers table from the controller.
   2.  cmbShipper ValueColumn to be ShipperID.
   3.  cmbShipper DisplayColumn to be CompanyName.
9. Build and test.
10. Add **Where** to show records where the order **ShipCountry** is equal to **UK**.
11. Build and test.
12. Set the **cmbCustomer** to show only **UK** customers.
13. Build and test.
14. Set the **cmbEmployee** to show only **UK** Employees.
15. Build and test.