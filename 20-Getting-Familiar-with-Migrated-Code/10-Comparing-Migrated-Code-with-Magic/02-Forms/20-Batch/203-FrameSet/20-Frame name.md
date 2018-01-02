keywords: task forms, frameset, frame name

# Frameset Frame name

Name in Migrated Code:   
Location in Migrated Code: **Constructor**  

![2018 01 02 16H32 14 Name](2018-01-02_16h32_14-name.jpg)

## Example :
```csdiff
public myFrameSet()
{
+    var a = new Shared.Theme.IO.Html.HtmlFrame() { Height = 180, Name = "a", Vertical = true, Width = 133 };
}
```

> 1. a is the name of the frame
> 2. In case the name is set using an expression, the following will be added:
>```csdiff
>+c1.BindName(() => "myName");
>```
