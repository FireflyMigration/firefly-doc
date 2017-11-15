# Exercise - Binding Controls

1. Add new UIController to the Exercises folder, name the new UIController **ShowEmployeesDataInTabs**. 
2. Set the **Employees** table as the main table 
3. Add local column type **NumberColumn**, name **TabValue**, set the default value to be 1 (use {}).
4. Add a method name it **GetFullName**, return type **Text**, return FirstName and LastName (remember to use trim and add empty space).
5. Build and go to the form designer.
6. Add **Employee ID** and the method **GetFullName** to the top left of the screen.
7. Add a **Tab control** to the form.
8. Set the Tab control **Properites**:  
   1. Set the **Valuse** to "1,2,3,4,5".
   2. Set the **DisplayValues** to "Personal,Address,Contact,Notes,Extra".
   3. Set the **Style** to **Flat**.
9. Add the following columns to the **Personal** tab:  
   1. LastName.  
   2. FirstName.
   3. Title.
   4. TitleOfCourtesy.
   5. BirthDate.
   6. HireDate.
10. Add the following columns to the **Adress** tab:  
    1. Address.
    2. City.
    3. Region.
    4. PostalCode.
    5. Country.
11. Add the following columns to the **Contact** tab:  
    1. HomePhone.
    2. Extension.
12. Add the following columns to the **Notes** tab: 
    1. Notes.
13. Add the following columns to the **Extra** tab: 
    1.  ReportTo.
    2.  PhotoPath.
14. Build and test.
15. In the **Notes** tab, make the Notes **TextBox** bigger, chance it's **Properites**:  
    1. Set the **Multiline** to true.
    2. Set the **Alignment** to "TopLeft".
16. Build and test.
17. Add one more instance of the employees table to the **ShowEmployeesDataInTabs** controller (Remember to name it a different name).
18. In the **Extra** tab, change the **ReportsTo** from TextBox to ComboBox.
19. Set the Name of the new ComboBox to be **cmbReportsTo**.
20. Set the ListSource to the new employees table instance.
21. set the ValueColumn to be EmployeeID.
22. set the DisplayColumn to be FirstName.
23. Add ListWhere to show all employees that there employeeID is not the main table employee ID.
24. Build and test.