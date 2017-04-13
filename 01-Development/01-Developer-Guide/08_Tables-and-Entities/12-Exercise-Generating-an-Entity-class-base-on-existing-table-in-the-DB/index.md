# Exercise - Generating an Entity class base on existing table in the DB

1.	Add two new indexes to **EmployeeCars**:
    1. name of the index **SortByEmployeeID** us the **EmployeeID** and the **CarsID**.
    1. name of the index **SortByCarManufacture** us the **CarManufacture**.
7.  Build and test using the **Developer tools**.
8.  Create a new UI controller and **ShowEmployeeCars**.
9.  Set the **EmployeeCars** to be the main table.
5.  Go to the **Form**, add a **grid**, add all the columns to the grid.
6.  Add a call to **ShowEmployeeCars** from a new menu entry in the **ApplicationMDI**.
7.  Build and test.
8.  use <kbd>Control</kbd><kbd>K</kbd> to change the index.
9.  Test the result after you change the index.