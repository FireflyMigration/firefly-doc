keywords: task forms, HTML Merge, tag variable

# Tag Var

Name in Migrated Code:    
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H04 31 Tagvar](2018-01-02_17h04_31-tagvar.jpg)

## Example var :
```csdiff
+        _viewMerge.Add(
+            	new Tag("name", a), 
```
> a represents the column

## Example expression:
```csdiff
+        _viewMerge.Add(
-            	new Tag("name", a), 
+            	new Tag("name", () => Time.Now), 
```
