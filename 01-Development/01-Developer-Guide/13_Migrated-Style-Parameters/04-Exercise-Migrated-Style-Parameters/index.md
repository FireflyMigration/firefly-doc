# Exercise - Migrated Style Parameters

1. Create a new UIController name it **ShowCustomers**.
2. Set the **Customers** Entity as the main table.
3. Add 2 **local columns**:  
	1. type **NumberColumn** name **NumberOfOrders**.
	2. type **NumberColumn** name **TotalFreight**.  
4. Add this columns to the form **(Do not use a grid)**:  
	1. From **Customer** CustomerID.
	2. From **Customer** CompanyName.
	3. From **Customer** ContactName.
	4. **Local** column **NumberOfOrders**.
	5. **Local** column **TotalFreight**.
5. Add a new menu entry and call **ShowCustomers**.  
6. Build and test.  
7. Add a new **BusinessProcess** name it **CalcTotalOrdersPerCustomer**.  
8. Set the **Orders** Entity as the main table.  
9. Add 3 **local columns**:  
	1. type **TextColumn** name **CustomerID**.
	2. type **NumberColumn** name **NumberOfOrders**.
	3. type **NumberColumn** name **TotalFreight**.
10. Add **Where** after the **From**, to show only records equal to the **CustomerID** local column.
11. In the **Run** method receive 3 Parameters and do:  
	1. **TextParameter** name **pCustomerID** use the BindParameter method to connect the parameter and the local column **CustomerID**.
	2. **NumberColumn** name **pNumberOfOrders**.  
	3. **NumberParameter** name **pTotalFreight** use the BindParameter method to connect the parameter and the local column **TotalFreight**.
	4. After the call to **Execute**, update the **pNumberOfOrders value** with the local column **NumberOfOrders** value.
12. Override the **OnLeaveRow**.
13. set **NumberOfOrders value** to increase by 1 for every row.  
14. set **TotalFreight value** to accumulate the value of **Freight** column from the **Orders** table.  
15. Build and test the **BusinessProcess** using the <kbd>Shift</kbd><kbd>F3</kbd> send **ANATR** and check the **Output** panel for the results.   
16. In **ShowCustomers** add a button to the screen, set the button text to **Get Total Orders**.  
17. set the value of **NumberOfOrders** and **TotalFreight** to zero.  
18. Call the **CalcTotalOrdersPerCustomer** from the button **click** event and send the parameters.  
19. Build and test, notice that **NumberOfOrders** and **TotalFreight** are update with values when clicking the button.  
20. In **ShowCustomers** view, find the call to **CalcTotalOrdersPerCustomer**.  
21. Try to change the second parameters **NumberOfOrders** and send its **Value**, notice the error.  
22. Cancel the last item change and try to do the same for **TotalFreight** notice that you will **not** get an error.
23. Build and test, notice that **TotalFreight** is not update when you click the button.
