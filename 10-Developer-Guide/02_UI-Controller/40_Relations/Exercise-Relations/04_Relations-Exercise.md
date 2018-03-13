# Exercise - UIController - Relations results

Your **ShowProducts** class should look like :
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
+       public readonly Models.Categories Categories = new Models.Categories();

        public ShowProducts()
        {
            From = Products;
+           Relations.Add(Categories, RelationType.Find,
+               Categories.CategoryID.IsEqualTo(Products.CategoryID));

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
    }
}
```

![Relation Designer Look](RelationDesignerLook.png)

<iframe width="560" height="315" src="https://www.youtube.com/embed/XJe4IZePjAg?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>