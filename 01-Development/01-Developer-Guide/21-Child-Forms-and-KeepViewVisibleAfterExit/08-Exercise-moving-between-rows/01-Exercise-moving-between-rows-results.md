# Exercise - moving between rows result

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
            RegisterCachedController<ShowProducts>(CalProducts);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCategoriesView(this);
        }
+       protected override void OnEnterRow()
+       {
+           Cached<ShowProducts>().Run(Categories.CategoryID, true);
+       }
        internal void CalProducts()
        {
-           Cached<ShowProducts>().Run(Categories.CategoryID); 
+           Cached<ShowProducts>().Run(Categories.CategoryID,false); 
        }
    }
}
```
Your **ShowProducts** class should look like :
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
    public class ShowProducts : UIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();
 
 
        public ShowProducts()
        {
            From = Products;
        }
 
-       public void Run(Number pCategoryID)
-       {
-           Where.Clear();
-           Where.Add(Products.CategoryID.IsEqualTo(pCategoryID));
-           Execute();
-       }
+       public void Run(Number pCategoryID,Bool pExit)
+       {
+           Exit(ExitTiming.BeforeRow, () => pExit);
+           Where.Clear();
+           Where.Add(Products.CategoryID.IsEqualTo(pCategoryID));
+           Execute();
+       }
        protected override void OnLoad()
        {
            KeepViewVisibleAfterExit = true;
            View = () => new Views.ShowProductsView(this);
        }
    }
}
```