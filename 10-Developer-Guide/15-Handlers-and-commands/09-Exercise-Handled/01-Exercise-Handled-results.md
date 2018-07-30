# Exercise - Handled result

Your **ShowCustomerPerRegion** class should look like :
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

        public readonly Northwind.Models.Customers Customers = new Northwind.Models.Customers();

        public ShowCustomerPerRegion()
        {
            From = Customers;
            Handlers.Add(System.Windows.Forms.Keys.F10).Invokes += e =>
            {
+               e.Handled = true;
                System.Windows.Forms.MessageBox.Show("ShowCustomerPerRegion: F10 keyboard event!");
            };
        }

        public void Run(Number pRegionID)
        {
            Where.Add(Customers.Region.IsEqualTo(pRegionID.ToString()));
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowCustomerPerRegionView(this);
        }
    }
}
```