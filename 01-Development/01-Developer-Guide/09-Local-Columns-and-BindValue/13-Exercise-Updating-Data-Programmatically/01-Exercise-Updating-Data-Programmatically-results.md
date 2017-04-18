# Exercise - Updating Data Programmatically result

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
        public readonly Models.Orders Orders = new Models.Orders();
+       public readonly DateColumn EstimatedArrivalDate = new DateColumn();
        public ShowOrders()
        {
            From = Orders;
            Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1), new Date(1997, 6, 30)));
        }

        public void Run()
        {
            Execute();
        }
        
        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersView(this);
        }
+       protected override void OnEnterRow()
+       {
+           EstimatedArrivalDate.Value = Orders.OrderDate.AddDays(30);
+       }
    }
}
```

The run time version should look like :
![2017-04-18_14h06_44](2017-04-18_14h06_44.png)