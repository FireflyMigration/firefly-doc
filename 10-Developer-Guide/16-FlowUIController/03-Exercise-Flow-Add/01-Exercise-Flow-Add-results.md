# Exercise - Flow Add result

Your **FlowProducts** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;
using System.Windows.Forms;

namespace Northwind.Exercises
{
    public class FlowProducts : FlowUIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();
+       public readonly Models.Categories Categories = new Models.Categories();

        public FlowProducts()
        {
            From = Products;
+           Relations.Add(Categories, RelationType.Find,
+               Categories.CategoryID.IsEqualTo(Products.CategoryID));

            Columns.Add(Products.ProductID);
+           Flow.Add(()=>MessageBox.Show("Category name is "+Categories.CategoryName));
            Columns.Add(Products.ProductName);
            Columns.Add(Products.CategoryID);
            Columns.Add(Products.UnitPrice);
            Columns.Add(Products.UnitsInStock);
            Columns.Add(Products.UnitsOnOrder);
+           Columns.Add(Categories.CategoryID);
+           Columns.Add(Categories.CategoryName);
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