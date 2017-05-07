# Exercise - Methods

1.	In **ShowProduct**:  
2.	Mark the all the **if** statements inside the **OnSavingRow**.
3.  Using the <kbd>control</kbd><kbd>.</kbd> extract them to a new method, name it **InputValidation**.  
4.	Build and test.
5.  Change the last **if** statement:  
    1. Extract the check for the **Relation Row Found** to a new method, name it **ValidateCategoryID**.
    2. Notice the **bool** returning value.
    3. Notice the use of **return** in the method.
6.	Build and test.
7.  Add **region** around the two new methods name it **expressions**
8.  Notice:
    1. You can collapse the region and expend it back.
    2. You can hover with the mouse over the collapse region to look at the code.
9.  Change the **ValidateCategoryID()** method to a one line method
10. Build and test