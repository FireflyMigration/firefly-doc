keywords: task forms, HTML Merge, Token prefix

# Token prefix expression

Name in Migrated Code: **TokenPrefix**   
Location in Migrated Code: **OnLoad**  

![2018 01 02 17H01 41 Prefix](2018-01-02_17h01_41-prefix.jpg)

## Example :
```csdiff
+   _viewMerge.TokenPrefix = u.RTrim("pref");

```
> In case the program uses the default prefix (<!$), the above will not be added