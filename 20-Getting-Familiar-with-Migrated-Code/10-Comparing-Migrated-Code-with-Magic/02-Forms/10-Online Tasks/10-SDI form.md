keywords: task forms, SDI
# SDI Form

Name in Migrated Code: **SetContainerForm**  
Location in Migrated Code: **OnControllerLoad() methods of the view class**  

## Example :
```csdiff
protected override void OnControllerLoad()
{
+   SetContainerForm(() => new ApplicationSDI());
}

```