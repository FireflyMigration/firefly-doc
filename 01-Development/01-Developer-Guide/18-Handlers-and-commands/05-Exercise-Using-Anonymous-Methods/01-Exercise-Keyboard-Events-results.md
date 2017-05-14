# Exercise - Keyboard Events result

Your **ShowRegions** class should look like :
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
    public class ShowRegions : UIControllerBase
    {

        public readonly Models.Region Region = new Models.Region();

        public ShowRegions()
        {
            From = Region;
+           Handlers.Add(System.Windows.Forms.Keys.F9).Invokes += ShowRegions_Invokes;
        }

+       private void ShowRegions_Invokes(Firefly.Box.Advanced.HandlerInvokeEventArgs e)
+       {
+           System.Windows.Forms.MessageBox.Show("I am handling the F9 keyboard event!");
+       }

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