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
11. Add a **where** in the **Run** method to show only customer that have the same **Region** have the parameter, notice that you will need to use **.ToString()**.
12. Add the following columns to a **grid** on the form:  
    1. CustomerID.
    2. CompanyName.
    3. Address.
    4. City.
    5. Region.
13. In **ShowRegions**.
14. Add a button to the screen, set the button text to **Show Region Customers**.
15. Try to call the **ShowCustomerPerRegion** from the button **click** event.
16. In **NorthwindBase** project, under **Customers** folder, create a new folder name it **Exercises**.
17. Add a new interface, name it **IShowCustomerPerRegion**.
18. Set the new interface to be public.
19. Add the Run with the same parameter definition as **ShowCustomerPerRegion**.(you will need to add using to Firefly.Box).
20. build **NorthwindBase**.
21. In **ShowCustomerPerRegion** add the interface next to the **UIControllerBase**.
22. In **ShowRegionsView** use **Create** to call IShowCustomerPerRegion remember:  
	1. Use the full **NameSpace**.  
	2. Send the right parameter.   
23. Build and test. 
