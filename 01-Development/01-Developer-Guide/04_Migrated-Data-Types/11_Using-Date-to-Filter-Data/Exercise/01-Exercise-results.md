# Exercise - result

The **ShowProducts** class should look like :
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
    public class ShowProducts : UIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();
        public readonly Models.Categories Categories = new Models.Categories();

        public ShowProducts()
        {
            From = Products;
            Relations.Add(Categories, RelationType.Find,
                Categories.CategoryID.IsEqualTo(Products.CategoryID));

            Where.Add(Products.CategoryID.IsEqualTo(2).Or(Products.CategoryID.IsEqualTo(4).Or(Products.CategoryID.IsEqualTo(6))));
            Where.Add(Products.UnitPrice.IsGreaterThan(25));

            OrderBy = Products.SortByProductName;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowProductsView(this);
        }
+       protected override void OnSavingRow()
+       {
+           if (Products.ProductName =="")
+               System.Windows.Forms.MessageBox.Show("Take notice : Product name is empty!");
+
+           if (Products.UnitsInStock==0 || Products.UnitsOnOrder==0)
+               System.Windows.Forms.MessageBox.Show("Take notice : Units in stock or Units on order is equal to zero");
+       }
    }
}
```