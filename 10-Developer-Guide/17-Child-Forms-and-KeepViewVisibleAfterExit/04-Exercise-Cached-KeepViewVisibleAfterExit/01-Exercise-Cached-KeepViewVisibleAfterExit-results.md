﻿# Exercise - Cached Keep View Visible After Exit result

Your **ShowCategories** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.KeepViewVisibleAfterExit
{
    public class ShowCategories : UIControllerBase
    {

        public readonly Models.Categories Categories = new Models.Categories();

        public ShowCategories()
        {
            From = Categories;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCategoriesView(this);
        }
+       internal void CalProducts()
+       {
+           Cached<ShowProducts>().Run(Categories.CategoryID); 
+       }
    }
}
```
Your **ShowCategoriesView** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using Firefly.Box.UI.Advanced;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.KeepViewVisibleAfterExit.Views
{
    partial class ShowCategoriesView : Shared.Theme.Controls.Form
    {
        ShowCategories _controller;
        public ShowCategoriesView(ShowCategories controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
-           new ShowProducts().Run(_controller.Categories.CategoryID);
+           _controller.CalProducts();
        }
    }
}
```

Your **ShowProducts** class should look like :
```csdiff
namespace Northwind.Exercises.KeepViewVisibleAfterExit
{
    public class ShowProducts : UIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();


        public ShowProducts()
        {
            From = Products;
        }

        public void Run(Number pCategoryID)
        {
+           Where.Clear();
            Where.Add(Products.CategoryID.IsEqualTo(pCategoryID));
            Execute();
        }

        protected override void OnLoad()
        {
            KeepViewVisibleAfterExit = true;
            View = () => new Views.ShowProductsView(this);
        }
    }
}
```