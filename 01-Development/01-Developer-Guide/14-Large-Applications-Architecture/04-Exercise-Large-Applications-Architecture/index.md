# Exercise - Large Applications Architecture

1. Using the runtime **Developer Tools**, **Generate Entity C#** add the **Region** entity to the **NorthwindBase**, **Models**.
2. Build **NorthwindBase**.
3. Add a new **UIController** to the **Exercises** name space in **Northwind** project, name it **ShowRegions**.
4. Set the new **Region** entity as the main table.
5. Build and add a grid that will show all the columns in the form.
6. Build and test.
7. In the **customer project** create a new folder name it **Exercises**.
8. Add a new **UIController** under the new folder, name it **ShowCustomerPerRegion**.
9. Set the **Customers** entity as the main table.
10. In the **Run** method add a parameter : type **Number** name **pRegionID**.
11. Add a **where** to the Run method to show only customer that have the same **Region** have the parameter, notice that you will need to use **.ToString()**.
12. In **ShowRegions**.
13. Add a button to the screen, set the button text to **Show Region Customers**.
14. Try to call the **ShowCustomerPerRegion** from the button **click** event.
15. In **NorthwindBase** project, under **Customers** folder, create a new folder name it **Exercises**.
16. Add a new interface, name it **IShowCustomerPerRegion**.
17. Set the new interface to be public.
18. Add the Run with the parameter definition.
19. build **NorthwindBase**.
20. In **ShowCustomerPerRegion** add the interface next to the **UIControllerBase**.
21. In **ShowRegionsView** use **Create** to call  IShowCustomerPerRegion remember:  
	1. Use the full **NameSpace**.  
	2. Send the right parameter.   
22. Build and test. 
