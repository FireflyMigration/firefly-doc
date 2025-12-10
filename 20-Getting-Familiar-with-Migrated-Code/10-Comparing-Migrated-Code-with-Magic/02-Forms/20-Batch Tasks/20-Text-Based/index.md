keywords: task forms, Text Based

# Text based forms

Name in Migrated Code: **_layout**  
Location in Migrated Code: **BusinessProcess class**  

## Example :
```csdiff
internal class PrintCustomers : BusinessProcessBase 
{
+   TextIO.PrintCustomersC1 _layout { get { return Cached<TextIO.PrintCustomersC1>(); } }
}
```

![2018 01 02 15H15 34](2018-01-02_15h15_34.jpg)
