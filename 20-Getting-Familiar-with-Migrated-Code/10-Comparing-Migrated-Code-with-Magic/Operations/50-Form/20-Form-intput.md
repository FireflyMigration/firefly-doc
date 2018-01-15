keywords: Form Input operation, Import, Delimiter 

![Form Input](FormInput.png)


### Migrated Code Examples:

**Simple Form intput**
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
     _layout.Import_TableB.ReadDoubleSeperated(_ioImport_TableB, '%');
}
```