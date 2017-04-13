# Exercise - result

The **ShowProducts** runtime should look like :
![Show Products Form view](2017-04-13_14H_08_02.png)

The **ShowProducts** code behind should look like :
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

+       private void button1_Click(object sender, ButtonClickEventArgs e)
+       {
+           MessageBox.Show("Total Units : will be displayed soon");
+       }

+       private void txtUnitsOnOrder_BindBackColor(object sender, ColorBindingEventArgs e)
+       {
+           if (_controller.Products.UnitsOnOrder == 0)
+               e.Value = Color.Red;
+           if (_controller.Products.UnitsOnOrder > 0 && _controller.Products.UnitsOnOrder <= 10)
+               e.Value = Color.Yellow;
+           if (_controller.Products.UnitsOnOrder > 10)
+               e.Value = Color.Green;
+       }
    }
}
```