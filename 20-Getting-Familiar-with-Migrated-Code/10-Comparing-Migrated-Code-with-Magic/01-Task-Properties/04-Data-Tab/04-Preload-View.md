keywords: Task Properties, Data Tab, Preload View, OnLoad, PreloadData

Name in migrated Code: **PreloadData**  
Location in migrated Code: **OnLoad**  

![](2017-11-15_15h58_55.png) 


## Migrated Code Example

```csdiff   
protected override void OnLoad()
{
+   PreloadData = Products.ProductID == 2041;
    View = () => new Views.ShowOrdersView(this);
}
```  
## Property Values

No or Expression Rules. The default is false which is Preload view = **No** in Magic


## See Also
* [UIController.PreloadData](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_PreloadData.htm) 