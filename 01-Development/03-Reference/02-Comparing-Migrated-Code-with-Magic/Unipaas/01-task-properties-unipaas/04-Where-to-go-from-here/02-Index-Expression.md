# Index Expression

Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **OnLoad Method**  

Note:  If the index is determined according to a boolean value based on an expression then the migrated code will have the orderBy statement in the OnLoad Method as opposed to the InitializeDataView Method. The following example shows the usage of a boolean expression to determine the index to be used in the Categories file:

Example:
```csdiff
protected override void OnLoad()
{
    // other code
    OrderBy = Customers.Indexes[u.If(v_Indicator == 1,
        Category.Indexes.IndexOf(Category.SortByCategoryID), 
        Category.Indexes.IndexOf(Category.SortByCategoryName))];
}
```
--- 
**See Also:**
* [UIController OrderBy](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_OrderBy.htm)
* [BusinessProcess OrderBy](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_OrderBy.htm)
---