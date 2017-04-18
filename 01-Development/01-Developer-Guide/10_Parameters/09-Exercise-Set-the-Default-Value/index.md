# Exercise - Set the Default Value

1. Add new **UIController** name it **ShowEmployees**.
2. Set the **Employees** Entity to be the main table.
3. Build.
4. Add the following columns to the form grid :  
   1. EmployeeID.
   1. LastName.
   1. FirstName.
   1. Title. 
5. Build and test.
6. Add a **button** on the form, name the new button **Show Cars**.
7. Using the new **button** click event call **ShowEmployeeCars**. (use the run snippet).
8. Build and test.
9. In **ShowEmployeeCars** add a **Number** parameter in the Run method, name it **EmployeeID**. 
10. Add a **Where** to show only cars that belong to the selected employee.
11. In **ShowEmployees** code behind send the **EmployeeID**.
12. Build and test.