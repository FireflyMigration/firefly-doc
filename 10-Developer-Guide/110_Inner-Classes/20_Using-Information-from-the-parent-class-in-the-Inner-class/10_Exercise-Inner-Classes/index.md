# Exercise - Inner Classes

1. In **ShowEmployees**.
2. Add two new local columns type NumberColumn:
   1. **NumberOfCars**.
   2. **LatestModel**.
3. Build and add the two columns to the grid in the form.
4. Save changes to Git.
5. Build and test.
5. Add a new inner class ,use **contr** snippet, remember to tab after update every item in the snippet.
   1. Name = **GetCarsInfo**.
   2. Inherit from **BusinessProcessBase**.
   3. **parent**  = name of the parent class **ShowEmployees**.
6. Set the main table of **GetCarsInfo** to be **EmployeeCars**.
7. Add a where to filter **GetCarsInfo** to the parent employee ID.
8. In the **Run** method set the parent two local columns to zero. 
9. Override the **OnEnterRow**.
10. Update the parent **NumberOfCars** to be accumulated by one.
11. Update the parent **LatestModel** to the current row **CarYear** only if it's bigger. (use if)
12.  In **ShowEmployees**.
13.  Override the **OnEnterRow**.
14.  Add a call to **GetCarsInfo**. (notice that you need to send **this** as parameter to the class constructor).
15.  Save changes to Git.
17.  Build and test.