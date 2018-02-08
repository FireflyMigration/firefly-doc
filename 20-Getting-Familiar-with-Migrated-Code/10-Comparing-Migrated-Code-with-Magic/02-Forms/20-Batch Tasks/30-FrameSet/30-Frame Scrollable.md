keywords: task forms, frameset, frame scrollable

# Frameset Frame Scrollable

Name in Migrated Code:   **Scroll**  
Location in Migrated Code: **Frame**  

![2018 01 02 16H32 14 Scrollable](2018-01-02_16h32_14-scrollable.jpg)

## Example :
```csdiff
public myFrameSet()
{
-    var a = new Shared.Theme.IO.Html.HtmlFrame() { Height = 180, Name = "a", Vertical = true, Width = 133 };
+    var a = new Shared.Theme.IO.Html.HtmlFrame() { Height = 180, Name = "a", Vertical = true, Width = 133, Scroll = true };
}
```