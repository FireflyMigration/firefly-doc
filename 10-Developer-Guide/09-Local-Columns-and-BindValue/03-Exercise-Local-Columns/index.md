# Exercise - Local Columns



1.	In **ShowOrders** Create a local **DateColumn**, name it **EstimatedArrivalDate**. (use the **mem** snippet).
2.  Add it to the grid next to the **OrderDate**.  
3.  Go Back to the **controller** and Override the **OnEnterRow**.  
4.  In the **OnEnterRow** Update the **Value** of **EstimatedArrivalDate** to the **OrderDate** value plus 30 days. (use the OrderDate add days method).
5.  Save changes to Git.
6.  Build and test.
6.  Notice that the **EstimatedArrivalDate** value is updated only after you enter to the row.
     