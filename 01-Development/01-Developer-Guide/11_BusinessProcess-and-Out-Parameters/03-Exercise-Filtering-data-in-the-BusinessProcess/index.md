# Exercise - Filtering data in the BusinessProcess

1.	Add new UIController name it **ShowShippers**.
2.  Set the **Shippers** Entity to be the main table.
2.  Add two local columns (use the mem snippet) :
    1.  **TotalOrders** name **"Total Orders"**, format **"6"**.
    2.  **TotalFreightValue** name **"Total Freight Value"**,format **"6.2C"**;
3.  Build and go to the form.
5.  Add a **grid** with **two columns** :
    1. **ShipperID**. 
    2. **CompanyName**.  
3. Add the two local columns to the screen out side the grid.
3. Build the project.
8. Add a new **BusinessProcess** name it **CalcOrderTotalForShipper**.
9. Set the **Order_Details** entity to be the main table.
10. In the **Run** method receive one parameter type **Number** name it **OrderID**.
11. Add a **Where** limit the  **BusinessProcess** to run only on orders that  


