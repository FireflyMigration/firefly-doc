keywords: task forms, SDI, Display Menu
# SDI - Display Menu

Name in Migrated Code: **property set to false**  
Location in Migrated Code: **OnControllerLoad() methods of the view class**  

![2018 01 02 13H48 13 1](2018-01-02_13h48_13-1.jpg)

## Example :
```csdiff
protected override void OnControllerLoad()
{
+   SetContainerForm(() => new ApplicationSDI(), false);
}

```



