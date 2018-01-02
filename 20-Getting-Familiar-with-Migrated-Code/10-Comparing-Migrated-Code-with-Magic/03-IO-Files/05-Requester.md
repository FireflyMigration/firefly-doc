## Requester
Used for call remote or internet activity.<br>
Name in Migrated Code: **ENV.IO.WebWriter** <br>
Location in Migrated Code: **OnLoad Method** 

```csdiff
ENV.IO.WebWriter _ioWeb
```

#### Name

```csdiff
_ioWeb = new ENV.IO.WebWriter()
{
+    Name = "WebOperation",
};
```

#### Exp/Var

```csdiff
+_ioWebOutput = new ENV.IO.WebWriter("FileName.htm")
{     
 
};
```
