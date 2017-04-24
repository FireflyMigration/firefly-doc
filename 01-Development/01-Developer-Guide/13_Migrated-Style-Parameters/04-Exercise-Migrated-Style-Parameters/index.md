# Exercise - Migrated-Style-Parameters

1. Create a new UIController name it **ShowCustomers**.
2. Set the **Customers** Entity as the main table.
3. Add 2 **local columns**:
	2. type **NumberColumn** name **NumberOfOrders**.
	3. type **NumberColumn** name **TotalFreight**.
4. Add this coulmns to the form :  
	1. From **Customer** CustomerID.
	2. From **Customer** CompanyName.
	3. From **Customer** ContactName.
	4. **Local** column **NumberOfOrders**.
	5. **Local** column **TotalFreight**.
4. Add a new menu entry and call **ShowCustomers**.
5. Build and test.
6. Add a new **BusinessProcess** name it **CalcTotalOrdersPerCustomer**.
7. Set the **Orders** Entity as the main table.
8. Add 3 **local columns**:
	1. type **TextColumn** name **CustomerID**.
	2. type **NumberColumn** name **NumberOfOrders**.
	3. type **NumberColumn** name **TotalFreight**.
9. In the **Run** method receive 3 Parameters and do:  
	1. **TextParameter** name **pCustomerID** use the BindParameter method to connect the paramter and the local column **CustomerID**.
	2. **NumberColumn** name **pNumberOfOrders**.  
	3. **NumberParameter** name **pTotalFreight** use the BindParameter method to connect the paramter and the local column **TotalFreight**.
	4. Afer the call to **Execute**, update the **pNumberOfOrders value** with the local column **NumberOfOrders** value.
10. Overrid the **OnLeaveRow**.
11. set **NumberOfOrders value** to increase by 1 for every row.
12. set **TotalFreight value** to accumulate the value of **Freight** column from the **Orders** table.
12. Build and test the **BusinessProcess** using the <kbd>Shift</kbd><kbd>F3</kbd> send **ANATR** and check the **Output** panel for the results. 
13. Add a button to the screen, set the button text to **Get Total Orders**.
14. Call the **CalcTotalOrdersPerCustomer** from the button **click** event and send the paramters.
15. Build and test, notice that **NumberOfOrders** and **TotalFreight** are update with values when clicking the button.