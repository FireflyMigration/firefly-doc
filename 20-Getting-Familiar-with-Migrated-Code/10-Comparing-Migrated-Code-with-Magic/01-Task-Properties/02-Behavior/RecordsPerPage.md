keywords: Task Properties, Behavior Tab, Records per page,

Location in migrated code: **OnLoad**

![](RecordsPerPage.png)

## Migrated Code Example

The **Batch Tasks** group is enabled in a BusinessProcess class (Batch task)

```csdiff   
protected override void OnEnterRow()
{
+    if (Counter >1 && (Counter - 1) % 20 == 0)
+       _ioPrint_Customers.EndCurrentPage();
}
protected override void OnLeaveRow()
{
+    _layout.Print_Customers1.WriteTo(_ioPrint_Customers);
}
protected override void OnEnd()
{
+    _layout.Print_Customers1.SuspendDataControls();
+    for (var i = Counter % 20; i < 20; i++)
     {
+   _layout.Print_Customers1.WriteTo(_ioPrint_Customers);
     }
+   _layout.Print_Customers1.ResumeDataControls();
}

```        





