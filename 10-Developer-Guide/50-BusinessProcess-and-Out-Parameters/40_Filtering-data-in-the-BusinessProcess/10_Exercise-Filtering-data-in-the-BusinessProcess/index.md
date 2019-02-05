# Exercise - Filtering data in the BusinessProcess

1.	Add new UIController name it **ShowShippers**.
2.  Set the **Shippers** Entity to be the main table.
2.  Add two local columns (use the mem snippet) :
    1.  **TotalOrders** name **"Total Orders"**,type **NumberColumn**, format **"6"**.
    2.  **TotalFreightValue** name **"Total Freight Value"**,type **NumberColumn**, format **"6.2C"**;
3.  Build and go to the form.
5.  Add a **grid** with **two columns** :
    1. **ShipperID**. 
    2. **CompanyName**.  
3. Add the **two local columns** to the screen **out side the grid**.(use <kbd>Ctrl</kbd><kbd>arrow keys</kbd> to set them next to the grid)
3. Save changes to Git.
8. Build and test.
8. Add a new **BusinessProcess** name it **CalcOrderTotalForShipper**.
9. Set the **Orders** entity to be the main table.
10. In the **Run** method receive one parameter type **Number** name it **ShipperID**.
11. Add a **Where** limit the  **BusinessProcess** to run only where **Orders ShipVia** equal to the received parameter.  
12. Override the **OnLeaveRow**
13. Add **Debug.WriteLine** to show the **Order ID** and **Shipper ID**. (remember to add using System.Diagnostics; if needed) 
12. Save changes to Git.
16. Build and test the **BusinessProcess** using the <kbd>Shift</kbd><kbd>F3</kbd> send **2** and check the **Output** panel for the results. 


