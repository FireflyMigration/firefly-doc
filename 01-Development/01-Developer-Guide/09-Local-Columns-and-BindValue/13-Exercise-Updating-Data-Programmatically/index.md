# Exercise - Updating Data Programmatically
 
1. In **ShowProducts** add a new method that return **Number**, name it **TotalUnits**.
2. **TotalUnits** return **UnitsInStock** plus **UnitsOnOrder**.
3. Go to the form.
4. Replace the message of the **"Total units" button** with a message **"Total Units : "** + **TotalUnits** method from the **controller**.
5. Build and test.
6. In **ShowEmployeeCars** add a new **NumberColumn** name it **AverageKM** and add it to the form.
7. Add a new **method** that return **Number**, name the new method **GetAverageKM**.
8. **GetAverageKM** return the value of **CarKM** divided to (**Today year** minus **CarYear**).  
9. Use the **BindValue** and set the **AverageKM** value to **GetAverageKM** method. 
10. Build and test.
11. Change the **GetAverageKM** method to one line method. ( use => )
12. Built and test.
13. Change the **BindValue** to use Lambda Expression instead of calling the **GetAverageKM** method.
14. Build and test.
15. In **ShowOrders** Bind the value of **EstimatedArrivalDate** to **OrderDate** plus 30 days.(use Lambda expression).
16. Build and test.
17. Notice that in run time the column show the right value in all the rows.

     