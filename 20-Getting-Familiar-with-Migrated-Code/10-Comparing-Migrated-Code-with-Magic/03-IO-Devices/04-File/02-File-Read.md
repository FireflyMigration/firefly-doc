keywords: File,File reader
## File with Read Access

Name in Migrated Code: **ENV.IO.FileReader** <br>
Location in Migrated Code: **OnLoad Method** 

The _ioText is defined in the class:
```csdiff
ENV.IO.FileReader _ioInput
```

The following sub sections describe the migrated code usage for the options and properties of FileReader.

#### Name

```csdiff
_ioInput = new ENV.IO.FileReader()
{
+    Name = "ReadFromFile",
    autoNewLine = false,  
};
```

#### Format
```csdiff
_ioInput = new ENV.IO.FileReader()
{     
    Name = "ReadFromFile",
+   autoNewLine = false,  
};
```

#### Exp/Var

```csdiff
+_ioInput = new ENV.IO.FileReader("FileName.Txt")
{     

};
```

#### Properties

##### Character set to use

```csdiff
_ioInPut = new ENV.IO.FileReader("FileName.Txt")
{     
+ Oem = true,
};
```
