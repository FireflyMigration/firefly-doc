keywords: Task Properties, Data Tab, Allow empty dataview, OnLoad

Name in migrated Code: **SwitchToInsertWhenNoRows**  
Location in migrated Code: **OnLoad**  

![](2017-11-15_15h48_39.png) 


## Migrated Code Example

```csdiff   
protected override void OnLoad()
{
+   SwitchToInsertWhenNoRows = true;
    View = () => new Views.ShowOrdersView(this);
}
```  

## Property Values

True or false. The default is false which is Allow empty dataview = **Yes** in Magic


## See Also
* [UIController.SwitchToInsertWhenNoRows](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_SwitchToInsertWhenNoRows.htm) 