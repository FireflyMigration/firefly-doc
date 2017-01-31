### Getting around in the Code
We have seen how we get information about the application internals while we are working on a deployment machine. Now let’s see how to get around in the code and find our way easily, while we’re working on a development machine.

#### 1. Visual Studio - Break with Shift + F12
1.	Run the application with debugging (F5) and open the Programs-> ShowOrders
2.	Press **Shift+F12**.
3.	Notice that the execution will be suspended and we will get to the Run method of the current program.
4.	Below the Run method is the **OnLoad** method where you can find all the program settings as well as a **reference to the View class**.
5.	Park on the ShowOrdersView class and go to the screen code using “Go To Definition” (F12) (**Make sure that the project of this program is loaded and exists in the Solution Explorer window**).
6.	Switch to design mode using “View Designer” (Shift + F7).
7.	Go back to the **Run method** in the controller class by pressing Ctrl+- twice. 
8.	Below the OnLoad is where the OnStart, OnEnterRow, OnSavingRow, Event Handlers and all the Expressions are.
9.	Above the Run method is the `InitializeDataViewAndUserFlow`, where the data view is defined (main entity, relation, filter and so on). __***Note***__: Don’t worry if you don’t understand every line of code now, as we will cover it on the second part of the training.
 
#### 2. Application Programs and Application Entities
1.	Open the ApplicationEntities class from the main project.
2.	This class contains a list of all the migrated entities including their index from Magic. This is used to support reference of an entity by its index that may exist in the original application.
3.	This list is also used to populate the Entities List screen (SHIFT + F2) that we used previously.
4.	Open the ApplicationPrograms class from the main project.
5.	This class contains a list of all the migrated programs including their index from Magic. This is used to support calling to a program by its index or public name.
6.	This list is also used to populate the Programs List screen (SHIFT+F3) that we used previously.
7.	Some of the Programs in the list have their class (type) inside a typeof and others have their class name as a string. We’ll explain this on the second part of the training when we’ll discuss the Solution Architecture in depth.
8.	Both the ApplicationEntities and the ApplicationPrograms lists are useful to locate a program or an entity, by its index if this is more familiar to you.

#### 3. Go To Definition vs. Navigate To

1.	In a big application like this, it is recommended to partition the solution into several projects. 
2.	All the projects have the same output path for their build output (dll file). That is the dlls folder.
3.	When one project depends on another project, it must have a reference to the project’s source code or to the project’s dll. In a big application like this, a reference to the dll is recommended, which allows opening only part of the solution at a time, instead of loading **the entire** source code into Visual Studio.
4.	Reference to dlls means that:
    i.	When you change the code in one project, you have to build the project, so that other projects will reference the new version of it.
    ii. When you go to the definition by using **“Go To Definition”** (F12) option of Visual Studio, you will most likely get to the metadata from the dll file and not to the actual code. The best way to get to the code is using the **“Navigate To”** (CTRL+,) option of Visual Studio, assuming that the code is in one of the loaded projects (The project appears in the solution explorer). If you have **ReSharper** (which is very recommended), than “Go To Definition” will take you to the actual source code.
5.	Open the ApplicationPrograms class and use F12 to go to the definition of program #5 (`ShowOrders`). Show that it takes you to the metadata and not to the actual code of the program.
    i.	Go back to the ApplicationPrograms class and this time press [CTRL+,] on the class name and notice that there are usually several matching results. You should find one that is not from the Base project. The class with the searched name and **“Core”** added at the end is the one with the actual logic code of the program.
