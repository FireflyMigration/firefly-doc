# Exercise - Columns Recompute result

The **ShowShippers** class should look like :
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
    public class ShowShippers : UIControllerBase
    {

        public readonly Models.Shippers Shippers = new Models.Shippers();
        public readonly NumberColumn TotalOrders = new NumberColumn("Total Orders","6");
        public readonly NumberColumn TotalFreightValue = new NumberColumn("Total Freight Value", "6.2C");

        public ShowShippers()
        {
            From = Shippers;
+           Columns.Add(Shippers.ShipperID);
+           Columns.Add(Shippers.CompanyName);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowShippersView(this);
        }
        protected override void OnEnterRow()
        {
            Cached<CalcOrderTotalForShipper>().Run(Shippers.ShipperID, TotalOrders, TotalFreightValue);
        }
    }
}
```
