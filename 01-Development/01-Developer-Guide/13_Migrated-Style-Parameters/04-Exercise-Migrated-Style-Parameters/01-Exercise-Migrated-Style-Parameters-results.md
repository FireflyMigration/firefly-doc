# Exercise - Migrated-Style-Parameters result

The **ShowCustomers** class should look like :
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
    public class ShowCustomers : UIControllerBase
    {

        public readonly Models.Customers Customers = new Models.Customers();
        public readonly TextColumn CustomerID = new TextColumn();
        public readonly NumberColumn NumberOfOrders = new NumberColumn();
        public readonly NumberColumn TotalFreight = new NumberColumn();

        public ShowCustomers()
        {
            From = Customers;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCustomersView(this);
        }
    }
}
```

The **CalcTotalOrdersPerCustomer** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Exercises
{
    public class CalcTotalOrdersPerCustomer : BusinessProcessBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public readonly TextColumn CustomerID = new TextColumn();
        public readonly NumberColumn NumberOfOrders = new NumberColumn();
        public readonly NumberColumn TotalFreight = new NumberColumn();

        public CalcTotalOrdersPerCustomer()
        {
            From = Orders;
            Where.Add(Orders.CustomerID.IsEqualTo(CustomerID));
            OrderBy.Add(Orders.CustomerID);
        }
        public void Run(TextParameter pCustomerID,NumberColumn pNumberOfOrders,NumberParameter pTotalFreight)
        {
            BindParameter(CustomerID, pCustomerID);
            BindParameter(TotalFreight, pTotalFreight);
            Execute();
            pNumberOfOrders.Value = NumberOfOrders;
        }
        protected override void OnLeaveRow()
        {
            NumberOfOrders.Value++;
            TotalFreight.Value += Orders.Freight;
        }
    }
}
```