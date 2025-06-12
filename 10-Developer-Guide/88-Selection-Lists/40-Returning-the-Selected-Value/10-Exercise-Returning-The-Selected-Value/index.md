# Exercise - Returning The Selected Value

In **SelectEmployees**:
1. Check the data type of Employee.EmployeeId (use "Go To Definition")
2. Set a local column **_EmployeeId** make sure that it is not **readonly**. 
3. In the **Run** method receive a parameter with the relevant column type, name it **employeeId**.  
3. In the **Run** method set _employeeId to reference to employeeId.
4. At the **OnSavingRow** update the _employeeId.Value to the Employees.employeeId (selected value).
5. Save changes to Git.
6. Build and test using the **Developer Tools**.
