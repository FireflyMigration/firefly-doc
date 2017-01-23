### KeepViewVisibleAfterExit
1.	Create the following UIControllers:
    a.	ShowProductsChild
        i.	Place a grid with the product details with the following:
          
                1.	CategoryID
                2.	ProductID
                3.	ProductName
        ii. Change the X location of the Form to 650.
        iii. Filter with the CategoryID
        iv. Use the `Exit()` method to close the screen
        v. Set the `KeepViewVisibleAfterExit` to `true` (in the `OnLoad()` method)
    b.	ShowCategoriesParent
        i.	Call to `ShowProductsChild` from the `OnEnterRow` method 
        ii. Make sure that the screen is opened only one time (use the `Cached` method)
2.	Build and test
