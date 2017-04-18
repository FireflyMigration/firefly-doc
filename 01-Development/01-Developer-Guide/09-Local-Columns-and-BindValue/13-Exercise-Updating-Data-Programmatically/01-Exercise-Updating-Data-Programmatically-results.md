# Exercise - Updating Data Programmatically result

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

        public readonly Models.Products Products = new Models.Products();
        public readonly Models.Categories Categories = new Models.Categories();

        public ShowProducts()
        {
            From = Products;
            Relations.Add(Categories, RelationType.Find,
                Categories.CategoryID.IsEqualTo(Products.CategoryID));

            Where.Add(Products.CategoryID.IsEqualTo(2).Or(Products.CategoryID.IsEqualTo(4).Or(Products.CategoryID.IsEqualTo(6))));
            Where.Add(Products.UnitPrice.IsGreaterThan(25));

            OrderBy = Products.SortByProductName;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowProductsView(this);
        }

        protected override void OnSavingRow()
        {
            InputValidation();
        }
        #region expressions
        private void InputValidation()
        {
            if (Products.ProductName == "")
                Message.ShowError("Product name is empty!");
            if (Products.UnitsInStock == 0 || Products.UnitsOnOrder == 0)
                System.Windows.Forms.MessageBox.Show("Units is zero");
            if (Products.UnitsInStock < 10)
                Message.ShowWarning("Not enough units");
            if (Products.UnitsOnOrder >= 50 && Products.UnitsOnOrder <= 100)
                Message.ShowError("Units on order are between 50 and 100");
            if (u.Len(u.Trim(Products.ProductName)) < 3)
                Message.ShowError("Please enter a valid product name");
            if (u.InStr(Products.ProductName, "%") >= 1 || u.InStr(Products.ProductName, "@") >= 1)
                Message.ShowError("% and @ are invalid characters in product name");
            if (u.Left(Products.ProductName, 1) == "T")
                Message.ShowWarningInStatusBar("Product name can't start with a T");
            if (ValidateCaregoryID())
                Message.ShowError("Please enter a valid category");
        }

        private bool ValidateCaregoryID()
        {
            return !Relations[Categories].RowFound;
        }

+       public Number TotalUnits()
+       {
+           return Products.UnitsInStock + Products.UnitsOnOrder;
+       }
        #endregion
    }
}
```

The **ShowProducts** code behind of the form should look like :
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
    partial class ShowProductsView : Shared.Theme.Controls.Form
    {
        ShowProducts _controller;
        public ShowProductsView(ShowProducts controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
-           MessageBox.Show("Total Units : will be displayed soon");
+           MessageBox.Show("Total Units : " + _controller.TotalUnits());
        }

        private void txtUnitsOnOrder_BindBackColor(object sender, ColorBindingEventArgs e)
        {
            if (_controller.Products.UnitsOnOrder == 0)
                e.Value = Color.Red;
            if (_controller.Products.UnitsOnOrder > 0 && _controller.Products.UnitsOnOrder <= 10)
                e.Value = Color.Yellow;
            if (_controller.Products.UnitsOnOrder > 10)
                e.Value = Color.Green;
        }
    }
}
```



The **ShowEmployeeCars** class should look like :
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
    public class ShowEmployeeCars : UIControllerBase
    {

        public readonly Northwind.Models.EmployeeCars EmployeeCars = new Northwind.Models.EmployeeCars();
+       public readonly NumberColumn AverageKM = new NumberColumn();
        public ShowEmployeeCars()
        {
            From = EmployeeCars;
+           AverageKM.BindValue(GetAverageKM);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }
+       public Number GetAverageKM()
+       {
+           return EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear);
+       }
    }
}
```

After **item 11** in the Exercise the **ShowEmployeeCars** class should look like :
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
    public class ShowEmployeeCars : UIControllerBase
    {

        public readonly Northwind.Models.EmployeeCars EmployeeCars = new Northwind.Models.EmployeeCars();
        public readonly NumberColumn AverageKM = new NumberColumn();
        public ShowEmployeeCars()
        {
            From = EmployeeCars;
            AverageKM.BindValue(GetAverageKM);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }
-       public Number GetAverageKM()
-       {
-           return EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear);
-       }
+       public Number GetAverageKM()=>EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear);
    }
}
```

After **item 13** in the Exercise the **ShowEmployeeCars** class should look like :
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
    public class ShowEmployeeCars : UIControllerBase
    {

        public readonly Northwind.Models.EmployeeCars EmployeeCars = new Northwind.Models.EmployeeCars();
        public readonly NumberColumn AverageKM = new NumberColumn();
        public ShowEmployeeCars()
        {
            From = EmployeeCars;
-           AverageKM.BindValue(GetAverageKM);
+           AverageKM.BindValue(()=>EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear));
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }
-       public Number GetAverageKM()=>EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear);
    }
}
```

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
        public readonly DateColumn EstimatedArrivalDate = new DateColumn();
        public ShowOrders()
        {
            From = Orders;
            Where.Add(Orders.OrderDate.IsBetween(new Date(1996, 1, 1), new Date(1997, 6, 30)));
+           EstimatedArrivalDate.BindValue(() => Orders.OrderDate.AddDays(30));
        }

        public void Run()
        {
            Execute();
        }
        
        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersView(this);
        }
        protected override void OnEnterRow()
        {
            EstimatedArrivalDate.Value = Orders.OrderDate.AddDays(30);
        }
    }
}
```
The run time version should look like :
![2017-04-18_14h06_44](2017-04-18_14h06_44.png)