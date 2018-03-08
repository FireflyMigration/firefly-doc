# Exercise - Creating a Simple Screen results

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

+       public readonly Models.Products Products = new Models.Products();

        public ShowProducts()
        {
+           From = Products;
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
The **ShowProducts Form Designer** should look like :  
![Show Products Screen](ShowProductsScreen.png)



<iframe width="560" height="315" src="https://www.youtube.com/embed/PkikKDuWjLw?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>