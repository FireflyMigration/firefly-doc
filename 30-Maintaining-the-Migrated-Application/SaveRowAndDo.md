# SaveRowAndDo()

---

SaveRowAndDo() method saves the current row to the database and then performs the action sent as
parameter to the method.  
If the method fails to save the data to the DB the action will not be performed.  



With Magic, we used to have a ‘Manager program’ we had to use , or use another way to commit the data to the database before proceeding to the next logic operation.

SaveRowAndDo() method do them both – saves the data and if succeeds, executes the next logic operation.




For example:
```csdiff   
void MyMethod()
{
    SaveRowAndDo(o=> PrintDoc() );
}
```        


With the above example
1. The OnLeaveRow() and OnSavingRow() methods are executed.
2. The data is saved to the Database.
3. If the data successfully saved 
   a. The method PrintDoc() is executed 
   b. Data is reloaded - OnEnterRow() is executed
4. If the data fail to be saved to the DB the action sent as parameter is not executed.

The SaveRowAndDo() method is designed to leave the current row, save it to the DB and then to perform the
action sent to it as parameter.
It designed to make sure data is saved to the DB before any operation is executed.