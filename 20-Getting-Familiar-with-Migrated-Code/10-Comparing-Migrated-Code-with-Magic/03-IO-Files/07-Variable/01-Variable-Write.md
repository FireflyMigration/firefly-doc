## Blob Variable-Write Access
Name in Migrated Code: **ENV.IO.ByteArrayWriter** <br>
Location in Migrated Code: **OnLoad Method** 

```csdiff
ENV.IO.ByteArrayWriter _ioPrint_Customers;
```

#### Name

```csdiff
_ioPrint_Customers = new ENV.IO.ByteArrayWriter(vMyBlob)
{
+   Name = "Print - Customers",
    AutoNewLine = false
};
```
#### Format
```csdiff
_ioPrint_Customers = new ENV.IO.ByteArrayWriter(vMyBlob)
{
    Name = "Print - Customers",
+   AutoNewLine = false
};
```

#### Exp/Var

Name of Blob Variable passed in Constructor

```csdiff
+_ioPrint_Customers = new ENV.IO.ByteArrayWriter(vMyBlob)
{

};
```


