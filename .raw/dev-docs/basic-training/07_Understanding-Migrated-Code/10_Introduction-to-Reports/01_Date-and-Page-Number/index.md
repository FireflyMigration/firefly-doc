### Date and Page Number
1.	Most reports have a date and the page number at each page.
2.	Let’s add these values to our page header.
3.	In the report BusinessProcess class, create the following methods:
```csdiff
+ public Date GetCurrentDate()
+ {
+     return Date.Now;
+ }

+ public Number GetCurrentPage()
+ {
+     return _printer.Page;
+ }
```
4.	The `_printer.Page` is instead of `u.Page(0,1)`. Both will work and if you go to the definition of `u.Page`, you will see that it uses `_printer.Page`.
5.	Build and go to the report layout.
6.	Add 2 textboxes at the top of the page and bind them to the methods.
7.	Build and run.

  
Discuss also what happens if you want to display the report submission time…
```csdiff
+ public TimeColumn _time = new TimeColumn();

public OrdersReport()
{
    From = Orders;
}

protected override void OnLoad()
{
    _layout = new Printing.OrdersReportLayout(this);
    _printer = new PrinterWriter { PrintPreview = true };
    Streams.Add(_printer);

+   _time.Value = Time.Now;
}

+ public Time GetTime()
+ {
+   return Time.Now;
+ }
```
8. Exercise: Date and Page Number

