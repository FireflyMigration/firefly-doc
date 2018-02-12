keywords: task forms, frameset, frame set

# FrameSet form

Name in Migrated Code: **_htmlFS**  
Location in Migrated Code: **Constructor**  

## Example :
```csdiff
internal class PrintCustomers : BusinessProcessBase 
{
+    _htmlFS = new Shared.Theme.IO.Html.HtmlFrameSet(this) { Text = "FS" };
}
```

