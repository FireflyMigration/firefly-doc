# Exercise - Raise result

Your **ShowRegionsView** class should look like :
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
    partial class ShowRegionsView : Shared.Theme.Controls.Form
    {
        ShowRegions _controller;
        public ShowRegionsView(ShowRegions controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
            Create<Customers.Exercises.IShowCustomerPerRegion>().Run(_controller.Region.RegionID);
        }

+       private void button2_Click(object sender, ButtonClickEventArgs e)
+       {
+           e.Raise(Command.GoToNextRow);
+       }

+       private void button3_Click(object sender, ButtonClickEventArgs e)
+       {
+           e.Raise(Command.GoToPreviousRow);
+       }
    }
}
```

The **ShowRegions** runtime should look like :  
![2017-05-14_16h50_41](2017-05-14_16h50_41.png)