# Exercise - Blocks in Flow result

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
using Firefly.Box.Flow;

namespace Northwind.Exercises
{
    public class FlowProducts : FlowUIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();
        public readonly Models.Categories Categories = new Models.Categories();

        public FlowProducts()
        {
            From = Products;
            Relations.Add(Categories, RelationType.Find,
                Categories.CategoryID.IsEqualTo(Products.CategoryID));

            Columns.Add(Products.ProductID);
            Flow.Add(()=>MessageBox.Show("Category name is "+Categories.CategoryName), FlowMode.Tab,Direction.Backward);
            Columns.Add(Products.ProductName);
+           Flow.StartBlock(()=>Products.UnitsInStock >0 && Products.UnitsOnOrder>0);
+           {
+               Flow.Add(() => MessageBox.Show("Right now at the " + GetPartOfDay()));
+               Flow.Add(() => MessageBox.Show("you have total value of " + GetTotalUnits()));
+           }
+           Flow.StartBlockElse();
+           {
+               Flow.Add(() => MessageBox.Show("There is an error in calculation"));
+           }
            Flow.EndBlock();
            Columns.Add(Products.CategoryID);
            Flow.Add(() => ENV.Message.ShowError("CategoryID can not be equal to zero"), () => Products.CategoryID == 0,Direction.Forward);
            Columns.Add(Products.UnitPrice);
            Flow.Add(() => MessageBox.Show("Total Value of Units In Stock " + GetTotalStockValue()), FlowMode.ExpandBefore);
            Columns.Add(Products.UnitsInStock);
            Columns.Add(Products.UnitsOnOrder);
            Flow.Add(() => MessageBox.Show("Total Value of Units on Order " + GetTotalOnOrderValue()), FlowMode.ExpandAfter);
            Columns.Add(Categories.CategoryID);
            Columns.Add(Categories.CategoryName);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.FlowProductsView(this);
        }

        Number GetTotalStockValue() => Products.UnitPrice * Products.UnitsInStock;
        Number GetTotalOnOrderValue() => Products.UnitPrice * Products.UnitsOnOrder;
+       Text GetPartOfDay()
+       {
+           if (Time.Now.Hour < 12)
+               return "morning";
+           else
+               return "evening";
+       }
+       Number GetTotalUnits() => GetTotalStockValue() + GetTotalOnOrderValue();
    }
}
```