### Flow.Add
1.	In “FlowProducts”, add a message box, using the `Flow.Add` method, between the “ProductID” column and the “ProductName” column, which displays the “CategoryName” (use a relation to “Categories” entity).
2.	Build and test.

### Flow.Add Condition
1.	In “FlowProducts”, add an input validation, using the `Flow.Add` method, which will show an error message and prevent the user from leaving the “ProductID” column, if there is no value in it.
2.	Build and test.

### Flow Direction 
1.	In “FlowProducts”, change the code of the input validation to display the error message only when the user navigates forward.
2.	Change the code of the message box between the “ProductID” column and the “ProductName” column to display the message only when the user navigates backward.
3.	Build and test.

### FlowMode
1.	In the previous input validation, show the message only when the user press the Tab key to navigate out from the “ProductID” column.
2.	Build and test.

### ExpandBefore and ExpandAfter
1.	In “FlowProducts”, add a selection list for the “CategoryID” column, using the ExpandBefore flow mode.
2.	Build and test.
3.	Now, change the code to use the ExpandAfter flow mode (and move the code to the correct location).
4.	Build and test the result. Notice the difference between ExpandBefore and ExpandAfter.
