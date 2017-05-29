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
+           RegisterCachedController<ShowProducts>(CalProducts);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCategoriesView(this);
        }
        internal void CalProducts()
        {
            Cached<ShowProducts>().Run(Categories.CategoryID); 
        }
    }
}
```