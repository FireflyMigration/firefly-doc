# Exercise - List Controls

1. Add new UIController to the Exercises folder, name the new UIController **ControlsDemo**. 
2. Set the Orders table as the main table 
3. Add **OrderID**, **ShipCountry** to a grid on the form.
4. Add 3 ComboBox to the grid to do so :  
   1. Add a column to the grid.  
   2. Name the columns :
      1. **Customer**.
      2. **Employee**.
      3. **Shipper**.
   3. Drag and drop a ComboBox from the toolbox to the new column.
5. The 3 ComboBox will be show data from :  
   1. CustomerID.
   2. EmployeeID.
   3. ShipVia.
6. Set the **Name** property of the 3 ComboBoxs to :
   1. cmbCustomer.
   2. cmbEmployee.
   3. cmbShipper.
7. In **ControlsDemo** controller define this 3 tables:  
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
10. Add **Where** To show record where the order **ShipCountry** equal to **UK**.
11. Build and test.
12. Set the **cmbCustomer** to show only **UK** customers.
13. Build and test.
14. Set the **cmbEmployee** to show only **UK** Employees.
15. Build and test.