# Exercise - Large Applications Architecture

1. Using the runtime **Developer Tools**, **Generate Entity C#** add the **Region** entity to the **NorthwindBase**, **Models**.
2. Add a new **UIController** to the **Exercises** name space in **Northwind** project, name it **ShowRegions**.
3. Set the new **Region** entity as the main table.
4. Build and add all the columns to the form.
5. Build and test.
6. In the **customer project** create a new folder name it **Exercises**.
7. Add a new **UIController** under the new folder, name it **ShowCustomerPerRegion**.
8. Set the **Customers** entity as the main table.
9. In the **Run** method add a parameter : type **Number** name **pRegionID**.
10. Add a where to the Run method to show only customer that have the same **Region** have the parameter, notice that you will need to use **.ToString()**.
11. In **ShowRegions**.
12. Add a button to the screen, set the button text to **Show Region Customers**.
13. Try to call the **ShowCustomerPerRegion** from the button **click** event.
14. In **NorthwindBase** project, under **Customers** folder, create a new folder name it **Exercises**.
15. Add a new interface, name it **IShowCustomerPerRegion**.
16. Set the new interface to be public.
17. Add the Run with the parameter definition.
18. build **NorthwindBase**.
19. In **ShowCustomerPerRegion** add the interface next to the **UIControllerBase**.
20. In **ShowRegionsView** use **Create** to call  IShowCustomerPerRegion remember:  
	1. Use the full **NameSpace**.  
	2. Send the right parameter.   
21. Build and test. 
