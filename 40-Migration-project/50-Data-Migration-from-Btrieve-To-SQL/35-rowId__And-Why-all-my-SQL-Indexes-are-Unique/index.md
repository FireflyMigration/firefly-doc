# rowId__And Why all my SQL Indexes are Unique

As part of the automatic migration to SQL we create the tables in SQL.
If you open the table definition using SQL management tool you may have notice this two items : 

1. All the table indexes are now unique regardless of it been unique or not in Btrieve.
2. A new column has been add to all the tables named  "rowid__" that is of type Identity.

In this article we will cover the reason why.

First let us start with an Ten thousand feet type of statement: 
"we use the rowid__ to get a unique row identifier, and we add that to all your indexes to make them Unique".


This will rise the following questions :

1. I have code column that is unique - why not use this column ?

Several reasons:

**Sorting of rows **

When using a UIController, the OrderBy has to be unique - the reason for that is that we need to find the next rows and previous rows - and without a unique index we'll get the same rows again. So - if the index is not unique, the UIController will automatically add the PrimaryKeyColumns of the Entity to the order by. So if'll you'll order by Name, it'll order by Name, rowid__.So - if your database index columns will not match the order by that the UIController is using - there is a less chance that the database will use that index, and more chance that it'll decide to do a full table scan - resulting with poorer performance.

**Row was lost**

The short reply will be to prevent the end user for getting the "Row was lost" exception.

When Btrieve updates a row – it **doesn't** do it based on the code column – it **does it based on Btrieve position**
so the identical behavior is to use an identity column that is external to the table columns and cannot be changed.
If we used the code column as the way to identify a unique row – and that column was changed – it can cause a "Row was lost exception".

Imagine the following scenario – we have a row with code "A" and it's position (rowid__)is 751.
1.	A parent task parks on the row.
2.	A sub task is called and update the code column from A to B.
3.	The sub task is done and the parent class now tries to update the row – and row A does not exist – hens – row was lost exception.

**Locking**

locking is done based on the position definition – so if we lock the Key "A" and change the code to "B" the row will not locked.

2. Why do I need my non Unique Index to become Unique ?

a.	We add the rowid__ column to the index making the index unique.
b.	It's better to have unique indexes from an application perspective
because in a UIController we need to know what is the next row, and what is the previous row.
So for every Order By statement that is not unique – a UIController will automatically add the unique columns to the Order By.
If the Index in the database doesn't have that extra column – it'll not be used causing poorer performance.
c.	Before we added the rowid__ column to the table – some customers complained that rows appear in a different order between
Btrieve and SQL. When we investigated it, we found that SQL and Btrieve sort non unique index differently.
Btrieve does so based on an extrapolation of the position. And SQL does so based on undocumented method.
To get a result that is as close as possible to the result in btrieve when using a non unique index
we migrate into the rowid__ column that extrapolation of the position value. 
