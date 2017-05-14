# Exercise - Binding Controls result

At item **14** Your **ShowEmployeesDataInTabs** class should look like :
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
    public class ShowEmployeesDataInTabs : UIControllerBase
    {
        public readonly Models.Employees Employees = new Models.Employees();
        public readonly NumberColumn TabValue = new NumberColumn { DefaultValue=1};

        public ShowEmployeesDataInTabs()
        {
            From = Employees;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeesDataInTabsView(this);
        }
        public Text FullName()
        {
            return Employees.FirstName + " " + Employees.LastName;
        }
    }
}
```
The **ShowEmployeesDataInTabs** runtime should look like :  
Personal Tab :  
![2017-05-14_13h38_06](2017-05-14_13h38_06.png)
Address Tab :  
![2017-05-14_13h41_30](2017-05-14_13h41_30.png)
Contact Tab :  
![2017-05-14_13h42_14](2017-05-14_13h42_14.png)
Notes Tab :  
![2017-05-14_13h42_44](2017-05-14_13h42_44.png)
Extra Tab:  
![2017-05-14_13h43_03](2017-05-14_13h43_03.png)


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