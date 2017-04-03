# Exercise - result

The **ShowOrders** class should look like :
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
    public class ShowOrders : UIControllerBase
    {
+       public readonly Models.Orders Orders = new Models.Orders();
        public ShowOrders()
        {
+           From = Orders;
+           Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1), new Date(1997, 6, 30)));
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersView(this);
        }
    }
}
```