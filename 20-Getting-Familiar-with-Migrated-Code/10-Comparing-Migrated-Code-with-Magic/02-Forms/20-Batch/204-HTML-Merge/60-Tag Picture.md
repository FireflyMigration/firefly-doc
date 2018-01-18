keywords: task forms, HTML Merge, tag picture

# Tag Picture

Name in Migrated Code:    
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H04 31 Tagpicture](2018-01-02_17h04_31-tagpicture.jpg)

## Example value :
```csdiff
+        _viewMerge.Add(
+            	new Tag("name", a, "HH:MM:SS")
```
> a represents the column

## Example expression:
```csdiff
+        _viewMerge.Add(
-            	new Tag("name", a, "HH:MM:SS")
+            	new Tag("name", a, () => "HH:MM:SS")
```
