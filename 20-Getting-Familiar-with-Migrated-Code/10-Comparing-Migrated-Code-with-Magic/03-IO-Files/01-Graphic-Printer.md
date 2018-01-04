keywords: Printer, Graphic Printer
## Graphic Printer
Name in Migrated Code: **ENV.Printing.TextPrinterWriter** <br>
Location in Migrated Code: **OnLoad Method** 

The following sub sections describe the migrated code usage for the options and properties of PrinterWriter.

#### Name


```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
+   Name = "Print - Customers",
    PrinterName = Shared.Printing.Printers.Printer1.PrinterName,
};
```
##### See Also :
* [Name property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_Name.htm) 

#### Printer

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{   
    Name = "Print - Customers",
+   PrinterName = Shared.Printing.Printers.Printer1.PrinterName,
};
```
##### See Also :
* [PrinterName Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PrinterName.htm) 

#### Exp/Var

```csdiff
+_ioPrint_Customers = new ENV.Printing.PrinterWriter(vFileName)
{
 
};
```

##### See Also :
* [FileName Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_FileName.htm) 

### Properties

#### PDLG

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
+   PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
    Copies = 1,
    LandScape = true,
    PrintPreview = true,
};
```

##### See Also :
* [PrintDialog Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PrintDialog.htm) 


#### Paper Size

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
    PrintDialog = true,
+   PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
    Copies = 1,
    LandScape = true,
    PrintPreview = true,

};
```
##### See Also :
* [PaperKind Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PaperKind.htm)  
* [PaperKind Enum](http://msdn.microsoft.com/en-us/library/d06f4sht)  

#### Page Header Form

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
    PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
+   PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
    Copies = 1,
    LandScape = true,
    PrintPreview = true,

};
```

##### See Also :
* [PageHeader Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PageHeader.htm)  
* [ReportLayout Class](http://www.fireflymigration.com/reference/html/T_Firefly_Box_Printing_ReportLayout.htm)


#### Page Footer Form

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
   PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
+   PageFooter = _layout.FooterLayout,
    Copies = 1,
    LandScape = true,
    PrintPreview = true,

};
```

##### See Also :
* [PageFooter Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PageFooter.htm)  
* [ReportLayout Class](http://www.fireflymigration.com/reference/html/T_Firefly_Box_Printing_ReportLayout.htm)


#### Copies and Copies Expression

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
   PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
+   Copies = 1,
    LandScape = true,
    PrintPreview = true,

};
```
###### Example Expression:
```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
    PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
+    Copies = Exp_1(),
    LandScape = true,
    PrintPreview = true,
};
```
##### See Also :
* [Copies Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_Copies.htm)  

#### Orientation

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
    PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
    Copies = 1,
+   LandScape = true,
    PrintPreview = true,
};
```
##### See Also :
* [Landscape Property](http://fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_Landscape.htm)  


#### Print Preview

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
    PrintDialog = true,
    PaperKind = System.Drawing.Printing.PaperKind.A4,
    PageHeader = _layout.HeaderLayout,
    PageFooter = _layout.FooterLayout,
    Copies = 1,
    LandScape = true,
 +   PrintPreview = true,
};
```

##### See Also :
* [PrintPreview Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Printing_PrinterWriter_PrintPreview.htm)  

