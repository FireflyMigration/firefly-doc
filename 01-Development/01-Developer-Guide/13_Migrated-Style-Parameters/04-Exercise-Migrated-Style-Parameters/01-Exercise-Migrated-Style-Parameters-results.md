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

The **ShowCustomersView** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using Firefly.Box.UI.Advanced;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.Views
{
    partial class ShowCustomersView : Shared.Theme.Controls.Form
    {
        ShowCustomers _controller;
        public ShowCustomersView(ShowCustomers controller)
        {
            _controller = controller;
            InitializeComponent();
        }

+       private void button1_Click(object sender, ButtonClickEventArgs e)
+       {
+           new CalcTotalOrdersPerCustomer().Run(_controller.Customers.CustomerID,_controller.NumberOfOrders,_controller.TotalFreight);
+       }
    }
}
```

After item 19 the **ShowCustomersView** class should look like :
The **ShowCustomersView** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using Firefly.Box.UI.Advanced;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.Views
{
    partial class ShowCustomersView : Shared.Theme.Controls.Form
    {
        ShowCustomers _controller;
        public ShowCustomersView(ShowCustomers controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
-           new CalcTotalOrdersPerCustomer().Run(_controller.Customers.CustomerID,_controller.NumberOfOrders,_controller.TotalFreight);
+           new CalcTotalOrdersPerCustomer().Run(_controller.Customers.CustomerID,_controller.NumberOfOrders.Value,_controller.TotalFreight);
        }
    }
}
```
After item 20 the **ShowCustomersView** class should look like :
The **ShowCustomersView** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using Firefly.Box.UI.Advanced;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.Views
{
    partial class ShowCustomersView : Shared.Theme.Controls.Form
    {
        ShowCustomers _controller;
        public ShowCustomersView(ShowCustomers controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
-           new CalcTotalOrdersPerCustomer().Run(_controller.Customers.CustomerID,_controller.NumberOfOrders.Value,_controller.TotalFreight);
+           new CalcTotalOrdersPerCustomer().Run(_controller.Customers.CustomerID,_controller.NumberOfOrders,_controller.TotalFreight.Value);
        }
    }
}
```