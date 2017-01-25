# Getting the code for the first time

<iframe width="560" height="315" src="https://www.youtube.com/embed/cqMe4SoLVzY1" frameborder="0" allowfullscreen></iframe>


1.	Download the source code folder (Dotnet) from the FTP Site
1.	Extract the .rar file 
1.  Run the buildDebug.bat (buildRelease.bat) file to build the solution.  
    * This batch file builds the solution outside visual studio.  
1.  The build results are in the bin folder
    * This folder contains the executable file (.exe), the .dll files and the ini file.  
    * This ini file is used when DbClick on the .exe to run the application
1.  Running the BuildDebug.bat file should be done when you receiving the code for the first time and when you are doing dramatic changes in the application. You don't need to build the application using this file on a daily basis or with every change.
1.	After building the project you can open the solution with Visual Studio
1.  By default the solution is built with reference to dll methodology.  
    * That means you don't need to load the entire solution to be able to work.  
    * You can load only part of the solution.  



**Build batch file**  
The Build file is a batch file that compiles the solution in the correct order.
There are 2 build batch files - BuildDebug.bat & buildRelease.bat
The BuildDebug.bat builds the solution with debug information.
The BuildRelease.bat builds a release version to be installed on the end customer's site. 

**The bin Folder**  
When building the project the bin folder is created and in it the compiled code: .exe file, the .dll files and the ini file.  

The ini file is the configuration settings file we use to run the application.  
When running the .exe file the ini file is being read  
The same ini exists in the code and can be modified.
When we run the application from Visual Studio and build it the ini file is being copied to the bin folder.  

Every project in the solution is being compiled and a .dll file is created for it.  
That .dll file is copied to the bin directory. 
If we built a debug version the debug information files (.pdb) are copied to that bin directory as well.  

**The solution is Visual Studio**  
Usually the solution is built from several projects.  
The original applications are built from thousands of programs and it doesn't make scene putting them all in a single .dll file,  
so the migrated application is split in to folders - smaller projects.  
This split is done during the migration based on a configuration file the customer can supply.  

Every program in the original application is migrated to a separate class in .Net.  
The subtasks are migrated to inner classes inside the 'parent' class.  
The **Class outline** display the program's tree hierarchic and let you easily navigate between the inner classes and to open their View.     

The View, the window of the class (program) is designed in the designer.  

The *Tables* defined in the original application are migrated to **Models classes** in the Base project.  
In the solution explorer you can extract the Table to view its fields
  
*Models* in the original application are migrated to **Types**.  
Field models are migrated to Types under the 'Types' folder (types namespace).  
Gui Display models become controls and are inside the Controls folder under the Views folder.   


**ApplicationPrograms / ApplicationEntities Files**  
This files contain the list of the application's programs or Tables with their numbers from the original application, names, public names and their types in .Net

