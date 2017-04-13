# Exercise - Create new Entity

1.	Find the **Models** folder in the **NorthwindBase**.
2.	Right click on the **Models** folder and **add new Item**, select the **Entity** template, name the new entity **EmployeeCars**.
3. Set the **DataSources** to be **Northwind1**, (copy the DataSources definition from one of the excising entities);
4. Add The following members :  
    1. **NumberColum** for the **EmployeeID** format **6**.
    1. **NumberColum** for the **CarID** format **6**.
    1. **TextColum** for the **CarManufacture** format **30**.
    4. **TextColum** for the **CarName** format **30**.
    5. **NumberColum** for the **CarYear** format **4**.
    6. **NumberColum** for the **CarKM** format **6.2C**.
6.	Set the **PrimaryKey** to be the **EmployeeID** and **CarID**
7.  Build and go to **RunTime**.
8.  Use the **developers tolls** to create the new Entity.
9.  Use <kbd>F4</kbd> to insert new records: 
    1. Add 2 **Toyota** for employee 1.
    1. Add 2 **BMW** for employee number 2.
    3. add 1 **Lamborghini** for employee number 3.