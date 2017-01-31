### Generate Entity Class Automatically
1.	Though it's good to know how to create an entity class manually, a Magic developer might miss the known "Get Definition" option.
2.	The option exists under Developer Tools menu.
3.	 Please check the option of creating the Entity C# file using the Developer Tools Menu (Right click on the status bar and select "Generate Entity C#")
![Developer Tool Generate Entity](Generate_entity.png)
4.	Select Northwind database
5.	Double-click on Employees table
6.	A code of an Employees entity class will be displayed.
7.	In **MyModels** folder, create a new Entity class named “Employees”
8.	From the generated code, copy only the **Employees** class.
9.	Replace it with the new class created in #7
10. In case you use Oracle database:
    a.	Change `Employees:Entity` to `Employees:OracleEntity` 
    b.	Add `PrimaryKey` attribute or add `UseRowIdAsPrimaryKey();` to the constructor.
12. Generate Entity Class Automatically 
