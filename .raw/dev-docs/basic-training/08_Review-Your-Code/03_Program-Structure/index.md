### Program Structure

* **1. Find the Screen Designer**

[Link to Doc.fireflymigration.com](http://doc.fireflymigration.com/doku.php/comparison_with_migrated_code/edeveloper/task_properties)
1.	When you break to code of the program you will find yourself in the Run method.
2.	Below the Run method is the OnLoad method, in which you can find the reference to the screen (usually the last line of code in the method).
3.	Right click the reference to the screen and press F12 to go to the screen definition.
4.	When you get to the screen you will be in the code behind of the Form class. Press Shift+F7 to switch to design view.
5.	Look for a control on the screen that is attached to and expression (rather than a Column). In the next section we will see how to find the expression code.

* **2.	Locate an expression**
  * **2.1	Using Ctrl+I**
1.	When searching a code file such as the controller class, you can press Ctrl+I to do incremental search.
2.	Once you press Ctrl+I, a search field will show up. As soon as you type something in this field, the file will be searched for this value and immediately mark the first occurrence that match the search term. 
3.	You can press F3 to jump to the next occurrence that match the search term.

    * **2.2	Using Ctrl+F12 (ReSharper)**
1.	If you have Resharper, you can press Ctrl+F12 to search the current code file.
2.	Once you press Ctrl+F12, a search field will show up, allowing you to search for a method / a class member. Notice that this feature only search in names of method or other class members such as fields and properties.
