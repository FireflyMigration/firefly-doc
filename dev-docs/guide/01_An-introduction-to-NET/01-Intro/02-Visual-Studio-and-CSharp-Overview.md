**Visual Studio and CSharp Overview**

**Solution Structure**

1.  Before opening the solution in the solution explorer, make sure to run `BuildDebug.bat` to build the project and make sure that everything is ready.

2.	Visual Studio is compound from three basic parts :  
    - **Solution Explorer** - provides an organized view of the solution which includes your projects and their files  
	- **Working area** - where you can edit your code  
	- **Tool box** - displays icons for controls and other items that you can add to Visual Studio projects  
     

3. In the solution explorer,  
	- *ENV* project - is the generic source code common to all migrated application.  
       ENV has a reference to the **Firefly.box.dll** which is also common code supplied by firefly    
	- *[Solution name]* - solution   
	- *[Solution name].[moduleName]* - The solution is split to several projects. 
       Every module has its controllers, views (screens),  
	- *[Solution name]Base* - contains the migrated tables under the Models folder, migrated Models under the Types folder and other objects which are shared by the whole solution.  

4. The startup project is the one in Bold and is the first to run when we runt he application.  
   The startup project includes several parts:
	 - .ini file - the configuration file use to run the application  
	 - The Views folder which contains all the menus  
	 - ApplicationCore class - is migrated version of the main program  
	 - ApplicationPograms class - is the list of the migrated programs with their numbers, names, public names, and their location inside the solution  
	 - ApplicationEntities class - is the list of the migrated tables with their numbers, names, public names, and their location inside the solution  
	 - program.cs - is the first program that runs when you launch the application.  
       Main is the program   
     

	 

<iframe width="560" height="315" src="https://www.youtube.com/embed/ztHuX9ncvTY" frameborder="0" allowfullscreen></iframe>