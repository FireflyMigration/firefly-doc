keywords: Printer, Text Printer
## Printer

Name in Migrated Code: **ENV.Printing.TextPrinterWriter** <br>
Location in Migrated Code: **OnLoad Method** 

The following sub sections describe the migrated code usage for the options and properties of TextPrinterWriter.

The _ioText is defined in the class:

```csdiff
ENV.Printing.TextPrinterWriter _ioText;
```

The following lists the migrated code equivalents for the Printer Options and Properties:

#### Name

```csdiff
_ioPrint_Customers = new ENV.Printing.TextPrinterWriter()
{
+    Name = "Print - Customers",
     Printer = Shared.Printing.Printers.Printer1,
     IgnoreNewPage = true,
	 LinesPerPage = 60,
};
```

#### Printer

```csdiff
_ioPrint_Customers = new ENV.Printing.TextPrinterWriter()
{
     Name = "Print - Customers",
+    Printer = Shared.Printing.Printers.Printer1,
     IgnoreNewPage = true,
	 LinesPerPage = 60,
};
```

#### Format

```csdiff
_ioPrint_Customers = new ENV.Printing.TextPrinterWriter()
{
    Name = "Print - Customers",
    Printer = Shared.Printing.Printers.Printer1,
+   IgnoreNewPage = true,
    LinesPerPage = 60,
};
```

---

#### Exp/Var

```csdiff
+_ioTextPrint = new ENV.Printing.TextPrinterWriter("%TextPrinterFileName%")
{

};
```

#### Rows

```csdiff
_ioTextPrint = new ENV.Printing.TextPrinterWriter("%PRN_PORT%")
{
	 Name = "Print - Customers",
     Printer = Shared.Printing.Printers.Printer1,
     IgnoreNewPage = true,
+	 LinesPerPage = 60,
};
_ioTextPrint.Open();
```

### Properties

#### Flip Lines

```csdiff
_ioTextPrint = new ENV.Printing.TextPrinterWriter("%PRN_PORT%")
{
	Printer = Shared.Printing.Printers.Printer1,
+	PerformRightToLeftManipulations = true;
};
_ioTextPrint.Open();
```

#### I/O name to Use

```csdiff
+_ioTextPrint = ENV.IO.TextFileWriter.FindIOByName(u.Trim(pFilename));
if(_ioTextPrint==null)
{
   _ioTextPrint = new ENV.IO.FileWriter()
  {
  	Name = "file1"
  };
  _ioTextPrint.Open();
}
Streams.Add(_ioTextPrint);
```
