# Exercise - Large Applications Architecture result

The **ShowRegions** class should look like :
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
    public class ShowRegions : UIControllerBase
    {

+       public readonly Models.Region Region = new Models.Region();

        public ShowRegions()
        {
+           From = Region;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowRegionsView(this);
        }
    }
}
```

The **ShowCustomerPerRegion** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Customers.Exercises
{
    public class ShowCustomerPerRegion : UIControllerBase,IShowCustomerPerRegion
    {

+       public readonly Northwind.Models.Customers Customers = new Northwind.Models.Customers();

        public ShowCustomerPerRegion()
        {
+           From = Customers;
        }

        public void Run(Number pRegionID)
        {
+           Where.Add(Customers.Region.IsEqualTo(pRegionID.ToString()));
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCustomerPerTerritoryView(this);
        }
    }
}
```

The **IShowCustomerPerRegion** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using Firefly.Box;

namespace Northwind.Customers.Exercises
{
-   interface IShowCustomerPerRegion
+   public interface IShowCustomerPerRegion
    {
+       void Run(Number pRegionID);
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
    partial class ShowRegionsView : Shared.Theme.Controls.Form
    {
        ShowRegions _controller;
        public ShowRegionsView(ShowRegions controller)
        {
            _controller = controller;
            InitializeComponent();
        }

+       private void button1_Click(object sender, ButtonClickEventArgs e)
+       {
+           Create< Customers.Exercises.IShowCustomerPerRegion>().Run(_controller.Region.RegionID);
+       }
    }
}
```
