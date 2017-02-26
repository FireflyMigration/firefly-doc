* Add the OnStart override method
 ```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public DemoLocalColumns()
    {
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.DemoLocalColumnsView(this);
    }
+    protected override void OnStart()
+    {
+    }
}
```
* Set the value of the FromDate and ToDate using their `Value` property - we use the '**=**' (equal) sign, to assign a value to the column
```csdiff
protected override void OnStart()
{
+    FromDate.Value = Date.Now;
+    ToDate.Value = FromDate.Value;
}
```
* When we are setting a column value - we use the `Value` property. 
* When we are getting a value from the column, we don't have to use the `Value` property - it is implicit. 
So Instead of writing:
```csdiff
ToDate.Value = FromDate.Value;
```
We can write:
```csdiff
ToDate.Value = FromDate;
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/wxbhNp-o-uI?list=PL1DEQjXG2xnKHKNIRzI4K6oZL-KulU-Vw" frameborder="0" allowfullscreen></iframe>