# Exercise - Using Groups result

Your **ProductsReport** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;
using ENV.Printing;

namespace Northwind.Exercises
{
    public class ProductsReport : BusinessProcessBase
    {
        PrinterWriter _printer;
        Printing.ProductsReportLayout _layout;

        public readonly Models.Products Products = new Models.Products();
        public readonly Models.Categories Categories = new Models.Categories();
 
        public ProductsReport()
        {
            From = Products;
            Relations.Add(Categories, RelationType.Find,
                Categories.CategoryID.IsEqualTo(Products.CategoryID));
 
            OrderBy.Add(Products.ProductName);
        }

        protected override void OnLoad()
        {
            _layout = new Printing.ProductsReportLayout(this);
            _printer = new PrinterWriter { PrintPreview = true };
            Streams.Add(_printer);
        }

        protected override void OnLeaveRow()
        {
            _layout.Body.WriteTo(_printer);
        }

        public void Run()
        {
            Execute();
        }
+       internal Date GetCurrentDate() => Date.Now;
+       internal Number GetCureentPage() => _printer.Page;
    }
}
```

The layout should look like :  
![2017-06-26_12h00_38](2017-06-26_12h00_38.png) 