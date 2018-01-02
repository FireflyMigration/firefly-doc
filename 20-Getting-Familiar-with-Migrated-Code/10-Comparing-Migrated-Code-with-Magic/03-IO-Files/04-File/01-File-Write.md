## File with Write Access
Name in Migrated Code: **ENV.IO.FileWriter** <br>
Location in Migrated Code: **OnLoad Method** 

The _ioText is defined in the class:

```csdiff
ENV.IO.FileWriter _ioFileWrite;
``` 

The following sub sections describe the migrated code usage for the options and properties of FileWriter.

### Name

```csdiff
_ioFileWrite = new ENV.IO.FileWriter()
{
+   Name = "PrintCustomersToFile",
    autoNewLine = false,
};
```

### Format

```csdiff
_ioFileWrite = new ENV.IO.FileWriter()
{     
    Name = "PrintCustomersToFile",
+   autoNewLine = false,
};
```

### Exp/Var

```csdiff
+_ioFileWrite = new ENV.IO.FileWriter("FileName.Txt")
{     
  
};
```

#### Append

```csdiff
_ioFileWrite = new ENV.IO.FileWriter("FileName.Txt")
{     
+ Append = true,
};
```
Note: This appears as one of the Access options

#### Properties

##### Character set to use

```csdiff
_ioFileWrite = new ENV.IO.FileWriter("FileName.Txt")
{     
+  Oem = true,
};
```

##### Flip Lines

```csdiff
_ioFileWrite = new ENV.IO.FileWriter("FileName.txt")
{
+	PerformRightToLeftManipulations = true;
};
_ioFileWrite.Open();
```

#### I/O name to Use

```csdiff
+_ioFileWrite = ENV.IO.TextFileWriter.FindIOByName(u.Trim(pFilename));
if(_ioFileWrite==null)
{
   _ioFileWrite = new ENV.IO.FileWriter()
  {
  	Name = "file1"
  };
  _ioFileWrite.Open();
}
Streams.Add(_ioFileWrite);
```

