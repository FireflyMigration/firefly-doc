# Preparations

## Prerequisites
 
1.	Visual Studio
2.	Templates and Snippet
3.	Firefly Tool Box
4.	Migrated application source code
5.	Migrated application database 
6.	Firefly Documentation chm file
7.	Firefly Code Samples Project 

## Trainer Preparations

1.	As a preparation for the training you need to:
    a. Read all the documents and do all the examples yourself before the training.
    b. Do all the exercises yourself before the training.
    c. Go over some parts of the documentation that will be discussed during the training:
        i. `UIController.Relations` (Add method, RelationType enum)
        ii. `UIController.Where`
2.	Before starting the training:
    a. Open Visual Studio. In Tools\Options menu, select “Windows Forms Designer” on the left tree and make sure that the “AutoToolboxPopulate” property is set to false.
    b. Open the migrated application, rebuild it and make sure it runs.
    c. In Build\Configuration Manager Menu, uncheck all projects except ENV and the main project. Also make sure ENV is built with no debug info (ENV project properties -> Build-> Advanced button -> Debug Info: = none). Build and run again.
    d. Make sure In Debug-> Exceptions that the Thrown checkbox is checked for CLR Exceptions.
    e. Make sure you have templates and snippet and test that the UIController template builds successfully.
    f. Verify that you have line numbers in the code area.
    g. Open the designer of the ApplicationMdi screen and leave the Visual Studio ready for the first demo.
