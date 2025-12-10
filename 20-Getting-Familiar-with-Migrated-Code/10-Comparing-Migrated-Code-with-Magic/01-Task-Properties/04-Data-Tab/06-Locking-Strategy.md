keywords: Task Properties, Data Tab, Locking Strategy, Rowlocking, OnLoad, LockCurrentRow

Name in Migrated Code: **Rowlocking**  
Location in Migrated Code: **OnLoad Method**  

![](2017-11-19_15h07_28.png) 


## Migrated Code Example 

Immediate example :    
```csdiff
protected override void OnLoad()
{
+   RowLocking = LockingStrategy.OnRowLoading; 
+   ReevaluateBindValueAndRelationsOnEnterRow = true;
    View = () => new Views.ShowOrdersView(this);
}

```
On Modify example:
```csdiff
protected override void OnLoad()
{
    RowLocking = LockingStrategy.OnUserEdit;
    View = () => new Views.ShowOrdersView(this);
}
```


## Property Values 

| Magic Name          | Migrated Code Name | 
|---------------------|--------------------|
| No Lock             | None               | 
| Immediate           | OnRowLoading       |
| Before Update       | OnRowSaving        | 
| On Modify           | OnUserEdit         | 

The default is Locking strategy = **No Lock** in Magic


## Note

Note: The migrated code will not write the `RowLocking` property if no locking is required.  
The `RowLocking` property will be written whenever a locking is used - even if it was the default in magic.   
It does that to explicitly indicate that there is locking.  

## See Also: 
* [UIController LockingStrategy Property](/reference/html/P_Firefly_Box_UIController_RowLocking.htm) 
* [BusinessProcess LockingStrategy Property](/reference/html/P_Firefly_Box_BusinessProcess_RowLocking.htm)
* [LockingStrategy Enum](/reference/html/T_Firefly_Box_LockingStrategy.htm)


For a deeper explanation of locking please refer to [the row locking article](row-locking.html)
