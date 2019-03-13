Keywords:batch, businessprocess, report

# Basic report class explained

<iframe width="560" height="315" src="https://www.youtube.com/embed/UYy7R-_3RIk?list=PL1DEQjXG2xnLss44EgCJq1bAM-Blgf2jd" frameborder="0" allowfullscreen></iframe>  

---

In the controller class we defined the Orders table as our main table:
```csdiff
+Public readonly Models.Orders Orders = new Models.Orders();

PrinterWriter _Printer;

Printing.Print_OrdersC1 _layout;

public Print_Orders()
{
+   From = Orders1;
}
protected override void OnLoad()
{
    _layout = new Printing.Print_OrdersC1(this);
    _Printer = new PrinterWriter { PrintPreview = true };
    Streams.Add(_ioPrint_Order);
}
protected override void OnLeaveRow()
{
    _layout.Body.WriteTo(_Printer);
}


```

#### Automatically added lines
The **PrinterWriter** is a class within ENV.Printing which is in charge of printing to a printer or to a pdf file.  
It is initiated in the OnLoad method, providing it with some properties (for example the print preview).

The **Streams.add** makes sure that all the resources of the report are cleard when the controller execution is done.
(this is true for any type of IO)

The **_layout** is the report view that will be printed - it is initiated in the OnLoad.  

In the **OnLeaveRow** you can see the **WriteTo** command which performs the actuall writting of the report, indicating the layout to be used, the section, and the PrinterWriter.