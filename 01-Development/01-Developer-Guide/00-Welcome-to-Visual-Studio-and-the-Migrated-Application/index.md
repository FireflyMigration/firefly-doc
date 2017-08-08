keywords: Migrated solution overview
In this article we'll review the migrated solution and it's different parts

**Solution Structure**

1.  Before opening the solution in the solution explorer, make sure to run `BuildDebug.bat` to build the project and make sure that everything is ready.

2.	Visual Studio is compound from three basic parts :  
    - **Solution Explorer** - provides an organized view of the solution which includes your projects and their files  
	- **Working area** - where you can edit your code  
	- **Tool box** - displays icons for controls and other items that you can add to Visual Studio projects  
     
## Migrated solution overview
3. In the solution explorer,  
	- *ENV* project - is the generic source code common to all migrated application.  
       ENV has a reference to the Firefly.box.dll which is also generic and shared by all migrated application. (It's source code is vailable to you when the migration project is concluded)
	- *[ProjectName] (Northwind) - this is the entry point to the application, and it compiles to an `exe` file.
	- *[ProjectName].[ModuleName] (Northwind.Customers) - Several project that holds the migrated `Controllers` (used to be called **programs** in magic). Each project should hold controllers from a similar domain or module.
	In it you'll find the `Views` Folder that has all the screens for programs in this module, and `Printing` folder that has all the layouts of the reports within this module.
       Every module has its controllers, views (screens),  
	- *[ProjectName]Base* - contains the migrated tables under the` Models` folder, migrated Models under the `Types` folder and other objects which are shared by the whole solution.  

4. The startup project is the one in Bold and is the first to run when we runt he application.  
   The startup project includes several parts:
	 - .ini file - the configuration file use to run the application  
	 - The Views folder which contains all the menus  
	 - ApplicationCore class - is migrated version of the main program  
	 - ApplicationPograms class - is the list of the migrated programs with their numbers, names, public names, and their location inside the solution  
	 - ApplicationEntities class - is the list of the migrated tables with their numbers, names, public names, and their location inside the solution  
	 - program.cs - is the first program that runs when you launch the application.  
       Main is the program   
     

<iframe width="560" height="315" src="https://www.youtube.com/embed/ztHuX9ncvTY?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>


