# The UIController's lifecycle

1.	Review the UIController life cycle slide in the Power Point presentation. (#9)
2.	There are several events that occur during the UIController's lifecycle.
    1.	Load – Occurs before the execution of the program starts. Used for initialize program settings like "Allow updates", Exit condition and streams instantiation.
Note: At this point the parameters values are available for usage.
We can use them to initialize the program's behavior according to the parameters' values. For example, set the activity to Browse / Update by a parameter.
    2.	**Start** – Occurs when the program execution starts. Equivalent to "Task Prefix" In Magic.
    3.	**Enter Row** – Occurs when a row is entered and after that row was loaded from the database. Equivalent to "Record Prefix" in Magic.
    4.	**Leave Row** – Occurs whenever the user leaves a row, before any changes are saved.
    5.	**Saving Row** – Occurs whenever the user leaves a row that had been changed and the changes are about to be saved to the database. Equivalent to "Record Suffix" in Magic.
    6.	**End** – Occurs when the program execution ends. Equivalent to "Task Suffix" in Magic.
3.	We will be focusing on the SavingRow event.
4.	In “ShowOrders”, override the OnSavingRow method and display a message box with the text: "The saving row event occurs only if the record has changed".
 
```diff
+ protected override void OnSavingRow()
+        {
+            System.Windows.Forms.MessageBox.Show("The saving row event occurs only if the record has changed");
+        }
```
5.	Other methods that can be overridden the same way - OnLoad, On Start, OnEnterRow OnLeaveRow and OnEnd.
6.	Run the program and notice that the message appears only when the row is changed.

7.	Exercise: UIController's Lifecycle

