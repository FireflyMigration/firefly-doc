keywords: task forms, GUI Output

# GUI Output

Name in Migrated Code: **_layout**  
Location in Migrated Code: **BusinessProcess class**  

## Example :
```csdiff
internal class PrintCustomers : BusinessProcessBase 
{
+    Printing.PrintCustomersC1 _layout { get { return Cached<Printing.PrintCustomersC1>(); } }
}
```



The GUI output interfact form has the following items:
1. Class
2. Area

![2018 01 02 14H40 57 General](2018-01-02_14h40_57-general.jpg)

The following articles will discuss them
