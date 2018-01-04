keywords: task forms, HTML Merge, Token suffix

# Token suffix expression

Name in Migrated Code: **TokenSuffix**   
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H01 41 Suffix](2018-01-02_17h01_41-suffix.jpg)

## Example :
```csdiff
+   _viewMerge.TokenSuffix = u.RTrim("suff");

```
> In case the program uses the default prefix (>), the above will not be added