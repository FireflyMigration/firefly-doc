keywords: XML direct,XML
## XML Direct Access

Name in Migrated Code: **ENV.IO.XML** <br>
Location in Migrated Code: **OnLoad Method** 

```csdiff
ENV.IO.XML _ioXmlFIle;
```

#### Name

```csdiff
_ioXmlFile = new ENV.IO.XML("c:\\temp\\FileName.xml")
{
+   Name = "MyXML",
   Readonly = true
};
```

#### Exp/Var
File name passed in constructor (c:\\temp\\FileName.xml)

```csdiff
+_ioXmlFile = new ENV.IO.XML("c:\\temp\\FileName.xml")
{
   Name = "MyXML",
   Readonly = true
};
```


---
