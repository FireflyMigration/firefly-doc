# Exercise - List Controls result

After item **9** Your **ControlsDemo** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.TestExercies
{
    public class ControlsDemo : UIControllerBase
    {

        public readonly Models.Orders Orders = new Models.Orders();
        public readonly Models.Customers Customers = new Models.Customers();
        public readonly Models.Employees Employees = new Models.Employees();
        public readonly Models.Shippers Shippers = new Models.Shippers();




        public ControlsDemo()
        {
            From = Orders;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ControlsDemoView(this);
        }
    }
}
```



After item **9** **ControlsDemoView** class should look like :
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

namespace Northwind.TestExercies.Views
{
    partial class ControlsDemoView : Shared.Theme.Controls.Form
    {
        ControlsDemo _controller;
        public ControlsDemoView(ControlsDemo controller)
        {
            _controller = controller;
            InitializeComponent();

+           cmbCustomer.ListSource = _controller.Customers;
+           cmbCustomer.ValueColumn = _controller.Customers.CustomerID;
+           cmbCustomer.DisplayColumn = _controller.Customers.CompanyName;
 
+           cmbEmployee.ListSource = _controller.Employees;
+           cmbEmployee.ValueColumn = _controller.Employees.EmployeeID;
+           cmbEmployee.DisplayColumn = _controller.Employees.LastName;
 
+           cmbShipper.ListSource = _controller.Shippers;
+           cmbShipper.ValueColumn = _controller.Shippers.ShipperID;
+           cmbShipper.DisplayColumn = _controller.Shippers.CompanyName;
        }
    }
}
```

After item **10** The **ControlsDemo** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.TestExercies
{
    public class ControlsDemo : UIControllerBase
    {

        public readonly Models.Orders Orders = new Models.Orders();
        public readonly Models.Customers Customers = new Models.Customers();
        public readonly Models.Employees Employees = new Models.Employees();
        public readonly Models.Shippers Shippers = new Models.Shippers();




        public ControlsDemo()
        {
            From = Orders;
+           Where.Add(Orders.ShipCountry.IsEqualTo("UK"));
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ControlsDemoView(this);
        }
    }
}
```

After item **11** **ControlsDemoView** class should look like :
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

namespace Northwind.TestExercies.Views
{
    partial class ControlsDemoView : Shared.Theme.Controls.Form
    {
        ControlsDemo _controller;
        public ControlsDemoView(ControlsDemo controller)
        {
            _controller = controller;
            InitializeComponent();

            cmbCustomer.ListSource = _controller.Customers;
            cmbCustomer.ValueColumn = _controller.Customers.CustomerID;
            cmbCustomer.DisplayColumn = _controller.Customers.CompanyName;
+           cmbCustomer.ListWhere.Add(_controller.Customers.Country.IsEqualTo("UK"));
 
            cmbEmployee.ListSource = _controller.Employees;
            cmbEmployee.ValueColumn = _controller.Employees.EmployeeID;
            cmbEmployee.DisplayColumn = _controller.Employees.LastName;
 
            cmbShipper.ListSource = _controller.Shippers;
            cmbShipper.ValueColumn = _controller.Shippers.ShipperID;
            cmbShipper.DisplayColumn = _controller.Shippers.CompanyName;
        }
    }
}
```

After item **12** **ControlsDemoView** class should look like :
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

namespace Northwind.TestExercies.Views
{
    partial class ControlsDemoView : Shared.Theme.Controls.Form
    {
        ControlsDemo _controller;
        public ControlsDemoView(ControlsDemo controller)
        {
            _controller = controller;
            InitializeComponent();

            cmbCustomer.ListSource = _controller.Customers;
            cmbCustomer.ValueColumn = _controller.Customers.CustomerID;
            cmbCustomer.DisplayColumn = _controller.Customers.CompanyName;
            cmbCustomer.ListWhere.Add(_controller.Customers.Country.IsEqualTo("UK"));
 
            cmbEmployee.ListSource = _controller.Employees;
            cmbEmployee.ValueColumn = _controller.Employees.EmployeeID;
            cmbEmployee.DisplayColumn = _controller.Employees.LastName;
+           cmbEmployee.ListWhere.Add(_controller.Employees.Country.IsEqualTo("UK"));
 
            cmbShipper.ListSource = _controller.Shippers;
            cmbShipper.ValueColumn = _controller.Shippers.ShipperID;
            cmbShipper.DisplayColumn = _controller.Shippers.CompanyName;
        }
    }
}
```

The **ControlsDemo** runtime should look like :  
![2017-05-07_17h37_02](2017-05-07_17h37_02.png)