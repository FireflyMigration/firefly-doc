keywords: Form Input operation, Import, Delimiter 

![Form Input](FormInput.png)


### Migrated Code Examples:

**Simple Form input**
```csdiff
protected override void OnLeaveRow()
{
     _layout.Import_TableB.ReadFrom(_ioImport_TableB);
}
```

**Using Delimiter = Single**

```csdiff
protected override void OnLeaveRow()
{
     _layout.Import_TableB.ReadSeparated(_ioImport_TableB, ';');
}
```

**Using Delimiter = Double**

```csdiff
protected override void OnLeaveRow()
{
     _layout.Import_TableB.ReadDoubleSeparated(_ioImport_TableB, '%');
}
```

> note that in previous versions this method had a spelling mistake and was called: `ReadDoubleSeperated`


## Now that you're in .NET
This code represents the migrated code, when we write new code in .NET we'll rarely write text file access using the structure that was used in magic - instead we would simply read and write strings.

We recommend that you'll checkout the [Writing and Reading files](writing-and-reading-files.html) section of the documentation for more information.