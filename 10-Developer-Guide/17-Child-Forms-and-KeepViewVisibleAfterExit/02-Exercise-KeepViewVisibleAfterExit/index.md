# Exercise - Keep View Visible After Exit

1.	Under the **Exercises folder**, create a new folder named **KeepViewVisibleAfterExit**.
2.  Create two  UIControllers:  
      1. **ShowProducts**  
         1. Place a grid with the product details with the following:
            1. CategoryID.  
            2. ProductID.  
            3. ProductName.  
         2. Change the X location of the Form to 650.
         3. In the **Run** method receive a parameter name **pCategoryID** type **Number**.
         3. Filter with the pCategoryID
         4. Set the **KeepViewVisibleAfterExit** to true (in the OnLoad() method)
      2. **ShowCategories**  
        1. Place a grid with the Categories details with the following:
           1.  CategoryID.  
           2.  CategoryName.  
        2. Place a button name it **Products**, call the  **ShowProducts** from the click event.  
3. Add **ShowCategories** to the **ApplicationMdi**.
4. Build and Test 

