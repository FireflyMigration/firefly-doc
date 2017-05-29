# Exercise - Keep View Visible After Exit result

Your **FlowProducts** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Exercises
{
-   public class FlowProducts : UIControllerBase
+   public class FlowProducts : FlowUIControllerBase
    {

+       public readonly Models.Products Products = new Models.Products();

        public FlowProducts()
        {
+           From = Products;
+           Columns.Add(Products.ProductID);
+           Columns.Add(Products.ProductName);
+           Columns.Add(Products.CategoryID);
+           Columns.Add(Products.UnitPrice);
+           Columns.Add(Products.UnitsInStock);
+           Columns.Add(Products.UnitsOnOrder);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.FlowProductsView(this);
        }
    }
}
```