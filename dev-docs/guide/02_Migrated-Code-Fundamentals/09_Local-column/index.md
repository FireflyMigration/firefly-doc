# Local Column
1.	There are columns that are not related to tables and are mainly used for calculations and temporary storage. Local columns are like virtual variables in Magic.
2.	Create a local column, and set its value as follows:
```diff
public class ShowOrders : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public readonly Models.Shippers Shippers = new Models.Shippers();
+        public DateColumn LastShippingDate = new DateColumn { Value = Date.Now.EndOfYear };
```
3.	Build.
4.	Add a new column to the screen
5.	Click on the column
6.	Move it to the left to be next to the Order Date.
![Move the column](move_column.png)
Run the program and notice that the value of the column is the same in all rows.
7.	Change the value and notice that for each row you enter, the value is updated. This will make more sense on the next topic
8.	Exercise: Local Columns

