# UI Controller Life cycle result

The **ShowOrderDetails** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;
using System.Diagnostics;

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
            Debug.WriteLine("OnLoad");
            View = () => new Views.ShowProductsView(this);
        }
        protected override void OnStart()
        {
            Debug.WriteLine("OnStart");
        }
        protected override void OnEnterRow()
        {
            Debug.WriteLine("OnEnterRow");
        }
        protected override void OnLeaveRow()
        {
            Debug.WriteLine("OnLeaveRow");
        }
        protected override void OnSavingRow()
        {
            Debug.WriteLine("OnSavingRow");
        }
        protected override void OnEnd()
        {
            Debug.WriteLine("OnEnd");
        }
        protected override void OnUnLoad()
        {
            Debug.WriteLine("OnUnLoad");
        }
    }
}
```