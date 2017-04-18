# UI Controller Life cycle result

The **ShowOrderDetails** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;
using System.Diagnostics;

namespace Northwind.Exercises
{
    public class ShowOrderDetails : UIControllerBase
    {

        public readonly Models.Order_Details Order_Details = new Models.Order_Details();
        public readonly Models.Products Products = new Models.Products();

        public ShowOrderDetails()
        {
            From = Order_Details;
            Where.Add(Order_Details.UnitPrice.IsGreaterOrEqualTo(20));
            OrderBy.Add(Order_Details.OrderID, SortDirection.Descending);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            Debug.WriteLine("OnLoad");
            View = () => new Views.ShowOrderDetailsView(this);
        }
        protected override void OnStart()
        {
            Debug.WriteLine("OnStart");
        }
        protected override void OnEnterRow()
        {
            Debug.WriteLine("OnEnterRow");
        }
        protected override void OnLeaveRow()
        {
            Debug.WriteLine("OnLeaveRow");
        }
        protected override void OnSavingRow()
        {
            Debug.WriteLine("OnSavingRow");
        }
        protected override void OnEnd()
        {
            Debug.WriteLine("OnEnd");
        }
        protected override void OnUnLoad()
        {
            Debug.WriteLine("OnUnLoad");
        }
    }
}
```