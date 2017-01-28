### Generate DataBase Entity From the code

1.	In the MyModels folder, create a new Entity class names"Managers" 
|    Name         |    Type            |    DB Name      |    Format    |
|-----------------|--------------------|-----------------|--------------|
|    ManagerID    |    NumberColumn    |    ManagerID    |    9         |
|    LastName     |    TextColumn      |    LastName     |    20        |
|    FirstName    |    TextColumn      |    FirstName    |    10        |
2.	Set the " ManagerID" column as the Primary Key.
3.	Create a new UIController named "ShowEmployeesCars”, which displays data from the new entity.
4.	Build and Test.
5.	Notice the error message.
6.	Add the `AutoCreateTable = true;` to the new entity constructor.
7.	Try to run the "ShowEmployeesCars" class again.


### Don't want this.