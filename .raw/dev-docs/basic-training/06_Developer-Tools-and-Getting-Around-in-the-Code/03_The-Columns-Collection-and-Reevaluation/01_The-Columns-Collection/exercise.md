### The Columns Collection

1.	Make sure the following settings are in the command line arguments of the main project (open the project properties window and go to the “Debug” tab):
    a.	/DBDEBUG = Y
    b.	/DBNOPARAMS = Y
2.	Run the application and open the “ShowProducts” screen.
3.	Go back to Visual Studio and open the Output window from the View menu.
4.	Examine the SELECT statement and notice that all the columns from the main entity and the related entities are selected.
5.	In “ShowProducts”, add the columns that are used by the program to the columns collections.
6.	Run the application and open the “ShowProducts” screen.
7.	Go back to Visual Studio and open¬¬ the Output window from the View menu.
8.	Examine the SELECT statement and notice that only the columns that were added to the columns collection are selected.
