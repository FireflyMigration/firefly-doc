# Exercise - Optional parameters result

The **CalcOrderTotalForShipper** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using ENV;
using ENV.Data;
using System.Diagnostics;

namespace Northwind.Exercises
{
    public class CalcOrderTotalForShipper : BusinessProcessBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        Number _numberOfOrders = 0;
        Number _totalValue = 0;

        public CalcOrderTotalForShipper()
        {
            From = Orders;
            Debug.WriteLine("CalcOrderTotalForShipper constructor");
        }
-       public void Run(Number pShipperID,NumberColumn pTotalOrders, NumberColumn pTotalFreightValue)
+       public void Run(Number pShipperID,NumberColumn pTotalOrders=null, NumberColumn pTotalFreightValue=null)
        {
            Where.Add(Orders.ShipVia.IsEqualTo(pShipperID));
            Execute();
+           if (pTotalOrders != null)
                pTotalOrders.Value = _numberOfOrders;
+           if (pTotalFreightValue != null)
            pTotalFreightValue.Value = _totalValue;
        }
        protected override void OnLeaveRow()
        {
            _numberOfOrders++;
            _totalValue += Orders.Freight;
            Debug.WriteLine("OrderID :" + Orders.OrderID + " Shipper ID :" + Orders.ShipVia);
            Debug.WriteLine("\t\tNumber of orders : " + _numberOfOrders + " Total value :" + _totalValue);
        }
    }
}
```
The **ApplicationMdi** call should look like :
```csdiff
+       private void runBPWithOptionalParametersToolStripMenuItem_Click(object sender, EventArgs e)
+       {
+           new Exercises.CalcOrderTotalForShipper().Run(2);
+       }
```
