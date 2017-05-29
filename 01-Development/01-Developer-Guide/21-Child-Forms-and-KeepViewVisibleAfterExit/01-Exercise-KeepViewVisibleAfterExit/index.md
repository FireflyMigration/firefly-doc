# Exercise - Keep View Visible After Exit

1.	Under the **training folder**, create a new folder named **KeepViewVisibleAfterExit**.
2.  Create two  UIControllers:  
      1. **ShowProducts**  
         1. Place a grid with the product details with the following:
            1. CategoryID.  
            2. ProductID.  
            3. ProductName.  
         2. Change the X location of the Form to 650.
         3. Filter with the CategoryID
         4. Set the "KeepViewVisibleAfterExit" to true (in the OnLoad() method)
      2. **ShowCategories**  
        1. Place a grid with the Categories details with the following:
           1.  CategoryID.  
           2.  CategoryName.  
        2. Call using *Cache* to "ShowProducts" from the OnEnterRow method.  
3. Build and Test 

