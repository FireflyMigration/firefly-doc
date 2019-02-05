# Exercise - Create Selection List result

After item **6** Your **ShowOrdersWithEmployeeSelection** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Exercises.SelectionList
{
    public class ShowOrdersWithEmployeeSelection : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();


        public ShowOrdersWithEmployeeSelection()
        {
            From = Orders;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersWithEmployeeSelectionView(this);
        }
    }
}
```

After item **17** Your **SelectCustomers** class should look like :

```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;
using System.Diagnostics;

namespace Northwind.Exercises.SelectionList
{
    public class SelectCustomers : UIControllerBase
    {

        public readonly Models.Customers Customers = new Models.Customers();

        public SelectCustomers()
        {
            From = Customers;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            Activity = Activities.Browse;
            AllowDelete = false;
            AllowInsert = false;
            AllowUpdate = false;
            AllowSelect = true;
            View = () => new Views.SelectCustomersView(this);
        }
        protected override void OnSavingRow()
        {
            Debug.WriteLine("Selecting Customer ID" + Customers.CustomerID);
        }
    }
}
```


The **ShowOrdersWithEmployeeSelection** runtime should look like :  

![ShowOrdersWithEmployeeSelection](2019-01-10_10h36_08.png)  

The **SelectCustomers** runtime should look like : 

![SelectCustomers](2019-01-10_10h36_08.png)
