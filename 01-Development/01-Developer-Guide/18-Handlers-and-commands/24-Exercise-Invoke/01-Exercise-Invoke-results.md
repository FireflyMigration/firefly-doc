# Exercise - Invoke result

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
        public readonly CustomCommand MySpecialCommand = new CustomCommand()
        {
            Precondition = CustomCommandPrecondition.LeaveRow
        }; 
        public readonly Models.Region Region = new Models.Region();

        public ShowRegions()
        {
            From = Region;
            Handlers.Add(System.Windows.Forms.Keys.F9,HandlerScope.CurrentTaskOnly).Invokes += e =>
            {
                System.Windows.Forms.MessageBox.Show("I am handling the F9 keyboard event!");
            };
            Handlers.Add(System.Windows.Forms.Keys.F10).Invokes += e =>
            {
                System.Windows.Forms.MessageBox.Show("I am handling the F10 keyboard event!");
            };
            Handlers.Add(System.Windows.Forms.Keys.F5, HandlerScope.CurrentTaskOnly).Invokes += e =>
            {
                Create<Customers.Exercises.IShowCustomerPerRegion>().Run(Region.RegionID);
                e.Handled = true;
            };

            var hF5 = Handlers.Add(System.Windows.Forms.Keys.F5, HandlerScope.CurrentTaskOnly);
            hF5.Invokes += e =>
            {
                Create<Customers.Exercises.IShowCustomerPerRegion>().Run(Region.RegionID);
                e.Handled = true;
            };
            hF5.BindEnabled(() => Region.RegionID == 1);

            Handlers.Add(Command.UndoChangesInRow, HandlerScope.CurrentTaskOnly).Invokes += e =>
            {
                e.Handled = Common.ShowYesNoMessageBox("Undo","Are you sure you want to undo current row changes",false);
            };
            Handlers.Add(MySpecialCommand, HandlerScope.CurrentTaskOnly).Invokes += e =>
            {
                System.Windows.Forms.MessageBox.Show("My Special Command Handler");
            };


        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowRegionsView(this);
        }
        protected override void OnStart()
        {
-           Raise(MySpecialCommand);
+           Invoke(MySpecialCommand);
        }
        protected override void OnLeaveRow()
        {
            System.Windows.Forms.MessageBox.Show("OnLeaveRow");
        }
    }
}
```
