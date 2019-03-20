# Exercise - Returning The Selected Value

In **SelectCustomers**:
1. Check the data type of Customers.CustomerId (use "Go To Definition")
2. Set a local column **_CustomerID** make sure that it is not **readonly**. 
3. In the **Run** method receive a parameter with the relevant column type, name it **customerID**.  
3. In the **Run** method set _customerId to reference to customerID.
4. At the **OnSavingRow** update the _customerId.Value to the Customers.CustomerId (selected value).
5. Save changes to Git.
6. Build and test using the **Developer Tools**.
