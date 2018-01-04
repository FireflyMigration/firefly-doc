keywords: task forms, frameset, frame sizeable

# Frameset Frame Sizeable

Name in Migrated Code:   **Resize**  
Location in Migrated Code: **Frame**  

![2018 01 02 16H32 14 Sizeable](2018-01-02_16h32_14-sizeable.jpg)

## Example :
```csdiff
public myFrameSet()
{
-    var a = new Shared.Theme.IO.Html.HtmlFrame() { Height = 180, Name = "a", Vertical = true, Width = 133 };
+    var a = new Shared.Theme.IO.Html.HtmlFrame() { Height = 180, Name = "a", Vertical = true, Width = 133, Resize = true };
}
```