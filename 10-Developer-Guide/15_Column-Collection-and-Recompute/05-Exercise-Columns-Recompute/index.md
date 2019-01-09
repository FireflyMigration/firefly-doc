# Exercise - Columns Recompute

1. In **ShowProducts**.
2. Add a new local Column, Type **NumberColumn**, Name **TotalValueInStock**.
3. Build.
4. Using the **Class Outline** go to the form.
5. Use the **Grid**, **Column Wizard** and add the new column to the grid.  
6. Go back to the **ShowProducts** controller.
7. Add this columns to the column collection:
	1. Products.ProductID.
	2. Products.ProductName.
	3. Products.CategoryID.
	4. Products.UnitPrice.
	5. Products.UnitsInStock.
	6. Products.UnitsOnOrder.
	7. Categories.CategoryID.
    8. Categories.CategoryName.
	9. TotalValueInStock.
8. Use **BindValue** to set the value of **TotalValueInStock** to show **UnitPrice** * **UnitsInStock**.
9. Save changes to Git.
10. Build and test.	(Change the number of Units In Stock and the check that TotalValueInStock is **change**).
10. Break into the code using the <kbd>Shift</kbd> <kbd>F12</kbd>.
11. Add **TotalValueInStock.__RecomputePath** the **Watch** panel.
12. Expand the result and notice the result.
13. Stop the program.
14. Use <kbd>Alt</kbd> <kbd>arrow up</kbd> to change the **Columns.Add** of **TotalValueInStock** location to be the first one.
15. Save changes to Git.
17. Build and test.	(Change the number of Units In Stock and the check that TotalValueInStock is **not changing**)
16. Break into the code using the <kbd>Shift</kbd> <kbd>F12</kbd>.
17. Check the **TotalValueInStock.__RecomputePath**.
18. Stop the program.
19. Use <kbd>Alt</kbd> <kbd>arrow down</kbd> to change the **Columns.Add** of **TotalValueInStock** location to be the last one.
20. Save changes to Git.
23. build and test.
