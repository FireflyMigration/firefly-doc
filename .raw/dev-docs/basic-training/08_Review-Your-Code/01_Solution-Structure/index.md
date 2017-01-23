### Solution Structure
1.	Welcome to your real application code. It is bigger than the Northwind application so let’s explore the solution structure.
2.	The entire application is partitioned to modules according to your configuration that defines which programs should be on each project.
3.	The Base project contains all the Entities (in the Models folder) and all the types, thus it is shared by all the projects in the solution.
4.	The startup project is bold and contains the ApplicationMdi screen, the ApplicationCore, which is the Main Program of the original application and the Program class, which is the entry point of the application, which start with some global setting, loads all the settings from the ini file and call to the Application (main program).
5.	The ENV project is part of the infrastructure of the application and contains some backward compatible functionality such as user management, logical names, ini file etc.
(show user methods, user settings, message)
6.	Two main solutions could be found –
    a.	[project] Full.sln – includes and loads all the projects (parts) of the solution
    b.	[project].sln - includes and loads only the root project
    c.	You can also create your own .sln file using the Full.sln leaving only the common used projects (Base, Shared, ENV etc.)

* **1.	BaseProject**

In the base project you can find all the entities in the Models folder, all the types and abstract classes for programs that are called from outside their project. We will explain this in more details later.

* **2.	SharedProject**

In the Shared project you can find all the common objects such as GUI controls, Printing controls, colors, fonts. Will be discussed later.
