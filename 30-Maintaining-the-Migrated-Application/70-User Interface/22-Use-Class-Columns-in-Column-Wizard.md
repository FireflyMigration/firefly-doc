keywords:ContainsData
# Class columns in column wizard

If you want to use data fields or properties of a simple class in the column wizard, add the [ContainsData] attribute to the class.

For example:
```csdiff
+   [Firefly.Box.UI.Advanced.ContainsData]
    public class MyClass
    {
        readonly TextColumn First = new TextColumn("First");
        readonly TextColumn Last = new TextColumn("Last");
        public MyClass() { }
        public void GetResultValues()
        {
            // Very difficult calculations
            ....
            First.Value = "First result";
            Last.Value = "Last resutl";
        }
    }
```

The addition of the line [Firefly.Box.UI.Advanced.ContainsData] makes the fields First and Last available in the column wizard of programs were MyClass is instantiated.
