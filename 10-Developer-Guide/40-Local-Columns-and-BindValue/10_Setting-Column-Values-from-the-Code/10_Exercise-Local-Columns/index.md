# Exercise - Local Columns



1.	Create a new UIController name it **ShowOrders**.
2.  Show Data from Orders Entity.
3.  Create a local **DateColumn**, name it **EstimatedArrivalDate**. (use the **mem** snippet).
4.  Add it to the grid next to the **OrderDate**.  
5.  Go Back to the **controller** and Override the **OnEnterRow**.  
6.  In the **OnEnterRow** Update the **Value** of **EstimatedArrivalDate** to the **OrderDate** value plus 30 days. (use the OrderDate add days method).
7.  Save changes to Git.
8.  Build and test.
9.  Notice that the **EstimatedArrivalDate** value is updated only after you enter to the row.
     
