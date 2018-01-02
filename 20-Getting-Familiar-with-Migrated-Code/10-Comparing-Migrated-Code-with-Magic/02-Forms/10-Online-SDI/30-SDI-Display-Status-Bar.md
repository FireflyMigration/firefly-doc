keywords: task forms, SDI, Display Status Bar
# SDI - Display Status Bar

Name in Migrated Code: **additional property**  
Location in Migrated Code: **OnControllerLoad() methods of the view class**  

![2018 01 02 13H48 13 3](2018-01-02_13h48_13-3.jpg)

## Example :
```csdiff
protected override void OnControllerLoad()
{
+    SetContainerForm(() => new ApplicationSDI() { ShowStatusStrip = false});
}

```



