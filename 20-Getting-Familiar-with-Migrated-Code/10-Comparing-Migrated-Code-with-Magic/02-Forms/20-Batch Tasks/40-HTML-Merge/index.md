keywords: task forms, HTML Merge, form name

# HTML Merge form name

Name in Migrated Code: **_view[FormName]**  
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H01 41 Formname](2018-01-02_17h01_41-formname.jpg)

## Example:
```csdiff
internal class PrintCustomers : BusinessProcessBase 
{
+    _viewMerge = new TextTemplate(@"c:\temp\myTemplate.html");
}
```


