### How to work

* **1. Partial Solution** 

“Reference to dlls” allows you to open a solution with just a few of the project and not the entire solution. To do this, make a copy of the solution file and edit it in Notepad. Notice that the solution file contains a list of loaded project, which you can edit to remove most of the projects and leave only the project you may want to work on.

* **2.	Build batch files**

Firefly provided 2 batch files with the migrated solution. buildDebug.bat is used to build the entire solution in debug mode and buildRelease.bat is used to build the entire solution in release mode. These files can be uses to build the solution outside the Visual Studio and can be used to automate the build process.

* **3.	Selective Build**

In order to improve the build time, you can use the Configuration Manager to control which project will be build each time you build the solution (or press on the Start with Debugging button). 
Notice that when you change a project that is not checked for build, you should build it manually so that the changes will be used by the startup project when you run the application.

* **4.	Command line arguments**

In the project properties, in the debug tab you can add command line argument that will be use just like flags in the shortcut in magic. For example, you can add `/DBDEBUG=Y` and `/DBNOPARAMS=Y` to show the SQL statements in the output window.

* **5.	Exceptions Break Management**
FlowAbortException is a normal exception which is expected wherever the Verify error was used in the original code. Uncheck the checkbox in the exception message to suppress it.
