keywords: Task Properties, Data Tab, Preload View, OnLoad, PreloadData

Name in migrated Code: **PreloadData**  
Location in migrated Code: **OnLoad**  

![](2017-11-20_13h45_46.png) 


## Migrated Code Example

```csdiff   
protected override void OnLoad()
{
    View = () => new Views.ShowOrdersView(this);
}
```  
## Property Values

True or False (or expression). The default is false which is Preload view = **No** in Magic


## See Also
* [UIController.PreloadData](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_PreloadData.htm) 