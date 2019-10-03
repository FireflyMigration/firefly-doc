This article explains the changes that need to be done to support C#6 style string manipulation Format in older code.

In essence we want `$"{Age:3P0}"` to work and respect the `3P0` format.

Here are the changes:
### Firefly.Box.Advanced.DataTypeBase class
1. Implement the IFormattable interface in the class definition
```csdiff
 /// <summary>
 /// The base type of any type in Firefly.Box
 /// </summary>
 [Firefly.Box.UI.Advanced.IsData]
-public abstract class DataTypeBase : IComparable
+public abstract class DataTypeBase : IComparable,IFormattable
 {
     internal DataTypeBase()
     {
     }
```
2. Add the `ToString` method to the class
```csdiff
+public virtual string ToString(string format, IFormatProvider formatProvider)
+{
+   return ToString(format);
+}
```


### Firefly.Box.Data.Advanced.ColumnBase
1. Implement the IFormattable interface in the class definition
```csdiff
/// <summary>
/// The Base class of all columns. 
/// </summary>
/// <remarks>
/// Represents the basic storage of data, and it's interaction with <see cref="UIController"/>, <see cref="BusinessProcess"/> and the database.
/// </remarks>
[UI.Advanced.IsData]
-public abstract class ColumnBase : WizardOfOz.Witch.Engine.StateSaver, WhereMeaningfullItem, IFilterItem
+public abstract class ColumnBase : WizardOfOz.Witch.Engine.StateSaver, WhereMeaningfullItem, IFilterItem,IFormattable
{
    string _caption;
    internal int _internalIndexInRow = -1;

```

2. Add the `ToString` method to the class:
```csdiff
+public virtual string ToString(string format, IFormatProvider formatProvider)
+{
+    return ToString(format);
+}
```



Thats it