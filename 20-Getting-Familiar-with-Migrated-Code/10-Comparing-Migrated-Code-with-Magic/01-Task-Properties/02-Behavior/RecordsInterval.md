keywords: Task Properties, Behavior Tab, Records interval, Interval

![](RecordsInterval.png)

## Migrated Code Example

The **Batch Tasks** group is enabled in a BusinessProcess class (Batch task)

```csdiff   
protected override void OnLoad()
{
+    UserInterfaceRefreshRowsInterval = 500;
}
```        





