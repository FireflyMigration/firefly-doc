# Creating New Entity
1.	In the Models folder, create a new Entity class named “Employees” to connect to the "Employees" table from the database.
2.	Add the following columns from the table to the new entity:

| Name       | Type         | DB Name    | Format      |
|------------|--------------|------------|-------------|
| EmployeeID | NumberColumn | EmployeeID | 9           |
| LastName   | TextColumn   | LastName   | 20          |
| FirstName  | TextColumn   | FirstName  | 10          |
| Title      | TextColumn   | Title      | 30          |
| BirthDate  | DateColumn   | BirthDate  | DD/MM/YYYYZ |
| HireDate   | DateColumn   | HireDate   | DD/MM/YYYYZ |
| HomePhone  | TextColumn   | HomePhone  | 24          |
| ReportsTo  | NumberColumn | ReportsTo  | 2           |

3.	Set the EmployeeID column as the Primary Key.
4.	Set Today as the Default value for HireDate column using { DefaultValue=Date.Now }
5.	Create a new UIController named "ShowEmployees”, which displays data from the new entity.
6.	Build and Test.
7.	Create a new line and verify that HireDate value is today.
