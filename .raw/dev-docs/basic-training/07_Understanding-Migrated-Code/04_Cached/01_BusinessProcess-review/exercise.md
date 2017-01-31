### BusinessProcess as Separate Class (Review)

1.	Create The following BusinessProcesses:
    a. **Count Products**
       i.	Create a new BusinessProcesses named "CountProducts" 
       ii.	Iterate all the rows of the "Products" table.
       iii. Inside the OnEnd() method, display a message box with the counter result value.
       iv. Add menu entry, build and run.
    b.	**SumFreight**
        i.	Create a new BusinessProcesses named "SumFreight" 
        ii. Create a local NumberColumn named "TotalFreight" to hold the sum.
        iii. Iterate all the rows of the "Orders" table and for each row, update the value of the "TotalFreight" column inside the OnLeave() method.
        iv. Inside the OnEnd() method, display a message box with the "TotalFreight" value.
2. Call each BusinessProcess from the main menu.
3. Build and test.
