keywords: Variable, Blob Variable
## Blob Variable-Read Access
Name in Migrated Code: **ENV.IO.ByteArrayReader** <br>
Location in Migrated Code: **OnLoad Method** 


```csdiff
ENV.IO.ByteArrayReader _ioPrint_Customers;
```

#### Name

```csdiff
_ioPrint_Customers = new ENV.IO.ByteArrayReader(V_myBlob)
{
+    Name = "Print - Customers",
     IgnoreLineFeed = true
            
};
```

#### Format

```csdiff
_ioPrint_Customers = new ENV.IO.ByteArrayReader(V_myBlob)
{
     Name = "Print - Customers",
+    IgnoreLineFeed = true
            
};
```

#### Exp/Var

Name of Blob Variable passed in Constructor

```csdiff
+ _ioPrint_Customers = new ENV.IO.ByteArrayReader(V_myBlob)
{

};
```
