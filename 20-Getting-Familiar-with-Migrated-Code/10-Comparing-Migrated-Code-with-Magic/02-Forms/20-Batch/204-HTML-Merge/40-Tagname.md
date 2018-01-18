keywords: task forms, HTML Merge, tage name

# Tag name

Name in Migrated Code: **Tag**   
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H04 31 Tagename](2018-01-02_17h04_31-tagename.jpg)

## Example :
```csdiff
+        _viewMerge.Add(
+            	new Tag("name", a), 
```
## Example name expression:
```csdiff
+        _viewMerge.Add(
-            	new Tag("name", a), 
+            	new Tag(() => "tagexp", a), 
```
