**Visual Studio and CSharp Overview**

**Solution Structure**

1.  Before opening the solution in the solution explorer, make sure to run `BuildDebug.bat` to build the project and make sure that everything is ready.

2.	Visual Studio is compound from three basic parts :  
    - **Solution Explorer**, provides you with an organized view of your projects and their files  
	- **Working area**, edits your code  
	- **Tool box**, displays icons for controls and other items that you can add to Visual Studio projects  
     

3. In the solution explorer,  
	- *ENV* project that represent all the sources code generated  
	- *Northwind* solution   
	- *Northwind.[moduleName]* that compound the migrated application.  
	- *NorthwindBase*, contains the migrated tables under the Models folder, migrated Models under the Types folder and other objects which are shared by the whole solution.  

5. In Northwind's project we have several parts:  
	 - .ini file, this configuration file use to run the application  
	 -  the Views folder, contains all the menus  
	 - ApplicationCore class, is migrated version of the main program  
	 - ApplicationPograms class, is the list of the migrated programs with their numbers, names, public names, and their location inside the solution  
	 - ApplicationEntities class, is the list of the migrated tables with their numbers, names, public names, and their location inside the solution  
	 - program.cs, is the first program that runs when you launch the application  
	 

<iframe width="560" height="315" src="https://www.youtube.com/embed/ztHuX9ncvTY" frameborder="0" allowfullscreen></iframe>