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

After item **15** The **Notes** Tab runtime should look like :  
![2017-05-14_13h55_04](2017-05-14_13h55_04.png)  


After item **24** **ShowEmployeesDataInTabs** class should look like :
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
+       public readonly Models.Employees EmployeesReportsTo = new Models.Employees();
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

**ShowEmployeesDataInTabsView** class should look like :
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
    partial class ShowEmployeesDataInTabsView : Shared.Theme.Controls.Form
    {
        ShowEmployeesDataInTabs _controller;
        public ShowEmployeesDataInTabsView(ShowEmployeesDataInTabs controller)
        {
            _controller = controller;
            InitializeComponent();

+           cmbReportsTo.ListSource = _controller.EmployeesReportsTo;
+           cmbReportsTo.ValueColumn = _controller.EmployeesReportsTo.EmployeeID;
+           cmbReportsTo.DisplayColumn = _controller.EmployeesReportsTo.FirstName;
+           cmbReportsTo.ListWhere.Add(_controller.EmployeesReportsTo.EmployeeID.IsDifferentFrom(_controller.Employees.EmployeeID));
        }
    }
}
```

The **ShowEmployeesDataInTabs** runtime should look like :  
Extra Tab:  
![2017-05-14_14h00_46](2017-05-14_14h00_46.png) 