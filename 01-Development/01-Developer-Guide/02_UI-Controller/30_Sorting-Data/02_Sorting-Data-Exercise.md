# Exercise - UIController - Sorting Data


1.	In **ShowProducts** Sort the data by the **CategoryID** in ascending order.
2.	Build and test.
3.	Add a sort by the **ProductName** in descending order.
4.	Build and test.

You **ShowProducts** should look like:
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

        public ShowProducts()
        {
            From = Products;
            Where.Add(Products.CategoryID.IsEqualTo(2).Or(Products.CategoryID.IsEqualTo(4).Or(Products.CategoryID.IsEqualTo(6))));
            Where.Add(Products.UnitPrice.IsGreaterThan(25));

+            OrderBy.Add(Products.CategoryID);
+            OrderBy.Add(Products.ProductName,SortDirection.Descending);
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

5.	Comment out the first two sort, and sort the data using the **SortByProductName** index. 
6.	Build and test. 

You **ShowProducts** should look like:
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

        public ShowProducts()
        {
            From = Products;
            Where.Add(Products.CategoryID.IsEqualTo(2).Or(Products.CategoryID.IsEqualTo(4).Or(Products.CategoryID.IsEqualTo(6))));
            Where.Add(Products.UnitPrice.IsGreaterThan(25));

-           //OrderBy.Add(Products.CategoryID);
-           //OrderBy.Add(Products.ProductName,SortDirection.Descending);
+           OrderBy = Products.SortByProductName;
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


<iframe width="560" height="315" src="https://www.youtube.com/embed/YDzp679xpeA?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>