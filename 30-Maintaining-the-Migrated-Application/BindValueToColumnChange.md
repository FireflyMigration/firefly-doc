# BindValueToColumnChange()

---

BindValueToColumnChange() is a special kind of binding a value.
A normal BindValue will determine the recompute path on its own based on the position of the columns.
With BindValueToColumnChange(), using the second parameter of the method, you can control which columns will affect the recompute path **regardless of their position**.
This is a new and powerful feature which enhances the capabilities of the recompute path. (Does not exist in Magic)


### The migrated code

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