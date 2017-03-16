# Main Table

Name in Migrated Code: **From**  
Location in Migrated Class: **InitializeDataView Method**  

Example:  
In the Class, define an object that represents the main table, as follows:
```csdiff 
internal readonly Model.Customers Customers = new Model.Customers;
```
In the constructor, define the table as the main table using From:
```csdiff 
public ShowCustomers()
{
    //other code
    InitializeDataView();
}
void InitializeDataView()
{
        From = Customers;
    // other code
}
```
---
**See Also:**
* [UIController From](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_From.htm)
* [BusinessProcess From](http://fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_From.htm)

---