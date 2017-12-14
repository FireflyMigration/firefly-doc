keywords: Evaluate Expression

![2017 12 14 11H39 15](2017-12-14_11h39_15.png)

## Migrated Code Examples:

### Simple Call

```csdiff
u.FileDelete(@"c:\temp\log.txt");
```

### Using Result

```csdiff
MyColumn.Value = u.FileDelete(@"c:\temp\log.txt");
```  

## Notes
In the migrated code, an expression is a method that can be called directly.

## See Also
[User Methods](user-methods-and-u-class.html)