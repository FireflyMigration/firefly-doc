keywords: Task Properties, Interface Tab, Open task window 

Name in migrated code: **View**  
Location in migrated code: **OnLoad**

![Open Task Window](OpenTaskWindow.png)


## Migrated Code Example


```csdiff   
protected override void OnLoad()
{
+    View = () => new Views.ProgBatchView(this);
}
``` 

When the property is set to No - View is not defined    



## Property default Value
For UIControllerBase (Online program in Magic) - The view property defined by default  
For BusinessProcessBase (Batch program in Magic) - View property by defualt not defined
       