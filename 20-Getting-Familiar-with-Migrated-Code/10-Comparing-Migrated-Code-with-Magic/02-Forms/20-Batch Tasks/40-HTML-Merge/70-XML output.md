keywords: task forms, HTML Merge, XML output

# XML output

Name in Migrated Code: **ReplaceXmlSpecialCharacters**   
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H01 41 Xml](2018-01-02_17h01_41-xml.jpg)

## Example:
```csdiff
+   _viewMerge.ReplaceXmlSpecialCharacters = true;
```

## Example expression:
```csdiff
-   _viewMerge.ReplaceXmlSpecialCharacters = true;
+   _viewMerge.ReplaceXmlSpecialCharacters = a != "";
```
