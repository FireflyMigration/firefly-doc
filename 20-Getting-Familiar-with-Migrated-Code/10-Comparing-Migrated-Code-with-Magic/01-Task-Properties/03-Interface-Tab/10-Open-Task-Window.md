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



## Property Values
For UIControllerBase (Online program in Magic) - View is defined
For BusinessProcessBase (Batch program in Magic) - View is not defined
       