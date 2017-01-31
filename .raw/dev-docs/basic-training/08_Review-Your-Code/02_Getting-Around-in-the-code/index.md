### Getting Around in the code
* **1.	Break using Shift + F12 (to see the columns values)**
1. The best and easiest way to get to the code of the current screen, is to press Shift+F12. This will take you to the Run method of the current program.
2. In the watch window, you can add the `this` keyword to explore the current controller. For example, `this.Columns` will show you all the columns that are used by the current controller and their values.
3. Below the Run method you will always find the OnLoad method which contains the program settings and a reference to the screen (view) of the program. Let’s make sure that this is the expected screen.
4. **Exercise**: pick 2-3 programs and go to the code of them. Open their screen in the Visual Studio Designer.

* **2	Call Stack screen (CTRL+F12 in runtime)**
1. On a deployment machine, the user can press Ctrl+F12 to open the call stack window and give you their exact location in the application code.

* **3.	Find a program by its index**
1. Blue lines are called from other dlls and string are not called from other dlls (not public).
2. Exercise: Finding a Program

* **4	Navigate to (Ctrl+,)**
1. To quickly navigate to a class or a method, press Ctrl+, and type the class name (or part of it). A list of optional classes / class members will pop up.
2. Find the item you are looking for in the list and you will get to its code.
3. Notice that only loaded projects that exists in the solution explorer windows are searched.

* **8.2.5	Find all References**
1. In a big solution with lots of project, it is recommended to use "**reference to dlls**". The advantage is that not all the projects should be loaded in Visual Studio.
2. The down side is that “**Find all references**” does not look for usages in the entire solution. The solution is to use a tool like **ReSharper** or the free tool from the same company **dotPeek** to get all the usages of an item.
