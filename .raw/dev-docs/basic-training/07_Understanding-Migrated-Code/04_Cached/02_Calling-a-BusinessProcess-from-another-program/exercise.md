### Calling a BusinessProcess from another program

Create the following UIControllers, with a BusinessProcess classes for calculation, as detailed below:

   a. **Categories**
       i. Create a UIController named "Categories"
       ii.	Create a local `NumberColumn` named “NumberOfProducts”.
       iii. Add CategoryID, CategoryName and NumberOfProducts to the form (No grid)
       iv. Go to the BusinessProcess program from previous exercise ("CountProducts") and add another `Run()` method that will receive a "CategoryID" and "NumberOfProducts"
       v. Filter "CountProducts" based on the CategoryID input parameter and return the count of the rows to the “NumberOfProducts” column.
       vi. Remove the Message box
       vii. In "Categories" override the `OnEntreRow()` method and call "CountProducts" with two parameters. (CategoryID and  NumberOfProducts)
       viii. Add "Categories" to the menu, Build and test.
    b. **Shippers**
       i. Create a UIController named "Shippers"
       ii. Create a local `NumberColumn` named “TotalFreight”.
       iii. Add ShipperID, CompanyName and "TotalFreight" to the form (No grid)
       iv. Go to the BusinessProcess program from previous exercise ("SumFreight") and add another `Run()` method that will receive a "ShipperID" and "TotalFreight"
       v. Filter "SumFreight" based on the ShipperID input parameter and return the count of the rows to the “TotalFreight” column.
       vi. Remove the Message box
       vii. In "Shippers" override the OnEnterRow() method and call "SumFreight" with two parameters. (ShipperID and  TotalFreight)
       viii. Add "Shippers" to the menu, Build and test.
