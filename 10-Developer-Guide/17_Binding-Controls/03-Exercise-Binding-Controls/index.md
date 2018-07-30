# Exercise - Binding Controls

1. Add new UIController to the Exercises folder, name the new UIController **ShowEmployeesDataInTabs**. 
2. Set the **Employees** table as the main table 
3. Add local column type **NumberColumn**, name **TabValue**, set the default value to be 1 (use `{}`).
4. Add a method, name it **GetFullName**, return type **Text**, return FirstName and LastName (remember to use trim and add an empty space).
5. Build and go to the form designer.
6. Add **Employee ID** and the method **GetFullName** to the top left of the screen.
7. Add a **Tab control** to the form.
8. Set the **Data** Propertie of the **Tab control**, to the **TabValue** **NumberColumn** in item 3. 
9. Set the Tab control **Properites**:  
   1. Set the **Valuse** to "1,2,3,4,5".
   2. Set the **DisplayValues** to "Personal,Address,Contact,Notes,Extra".
   3. Set the **Style** to **Flat**.
10. Add the following columns to the **Personal** tab:  
   1. LastName.  
   2. FirstName.
   3. Title.
   4. TitleOfCourtesy.
   5. BirthDate.
   6. HireDate.
11. Add the following columns to the **Address** tab:  
    1. Address.
    2. City.
    3. Region.
    4. PostalCode.
    5. Country.
12. Add the following columns to the **Contact** tab:  
    1. HomePhone.
    2. Extension.
13. Add the following columns to the **Notes** tab: 
    1. Notes.
14. Add the following columns to the **Extra** tab: 
    1.  ReportTo.
    2.  PhotoPath.
15. Build and test.
