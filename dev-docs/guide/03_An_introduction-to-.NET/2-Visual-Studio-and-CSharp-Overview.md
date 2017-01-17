## Visual Studio and C# Overview

**Solution Structure**

1.  Before open the solution in the solution explorer, make sure to run `BuildDebug.bat` to build the project and make sure that everything is ready.
2.	Visual Studio is compound from three basic parts :
	a. **Solution Explorer**, provides you with an organized view of your projects and their files
	b. **Working area**, edits your code
	c. **Tool box**, displays icons for controls and other items that you can add to Visual Studio projects
4. In the solution explorer, 
	a. *ENV* project that represent all the sources code generated
	b. *Northwind* solution 
	c. *Northwind.[moduleName]* that compound the migrated application.
	d. *NorthwindBase*, contains the migrated tables under the Models folder, migrated Models under the Types folder and other objects which are shared by the whole solution.

5. In Northwind's project we have several parts:
	 a. .ini file, this configuration file use to run the application
	 b. the Views folder, contains all the menus
	 c. ApplicationCore class, is migrated version of the main program
	 d. ApplicationPograms class, is the list of the migrated programs with their numbers, names, public names, and their location inside the solution
	 e. ApplicationEntities class, is the list of the migrated tables with their numbers, names, public names, and their location inside the solution
	 f. program.cs, is the first program that runs when you launch the application
	 

<iframe width="560" height="315" src="https://www.youtube.com/embed/cqMe4SoLVzY" frameborder="0" allowfullscreen></iframe>