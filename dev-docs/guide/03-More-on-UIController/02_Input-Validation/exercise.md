### Input Validation Using if Statement

1.	In "ShowProducts", override the OnSavingRow method.
2.	Show a warning if the "ProductName" column is empty.
3.  Build and test
3.	Show a warning it the "UnitsInStock" is 0 or "UnitsOnOrder" is 0.
4.	Build and test.


### Input Validation Using the Message Class

1.	In "ShowProducts", make the "ProductName" column mandatory by adding an error message if the field is empty.
2. build and test.
2.	Add a warning message if the "UnitsInStock" is less than 10.
2. build and test.
3.	Add an error message if the "UnitsOnOrder" is between 50 and 100.
4.	Build and test. 

### Using User Methods
1.	In "ShowProducts", add an error message if the "ProductName" has less than 3 characters (using the u.Len method). Use Trim where needed.
2.	Add an error message in status bar if the "ProductName" contains one of the following characters: %, @.
3.	Add a warning in status bar if the "ProductName" starts with "T" (using the u.Left method).
4.	Build and test.

### Exercise: RowFound Property
1.	Using the RowFound property, In "ShowProducts", add an error message if the "CategoryID" is not found
2.	Build and Test.

