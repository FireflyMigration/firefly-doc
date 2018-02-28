keywords: Console
## Console

Same as 'Printer' but with PrintPreview = true and Landscape = true

```csdiff
_ioPrint_Customers = new ENV.Printing.PrinterWriter()
{
  Name = "Print - Customers",
+ PrintPreview = true,
+ Landscape = true
};
Streams.Add(_ioPrint_Customers);
```