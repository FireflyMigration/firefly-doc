# Exercise - Inner Classes result

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
        public readonly NumberColumn AverageKM = new NumberColumn();
        public ShowEmployeeCars()
        {
            From = EmployeeCars;
            AverageKM.BindValue(() => EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear));
        }

        public void Run(Number EmployeeID)
        {
            EmployeeCars.EmployeeID.DefaultValue = EmployeeID;
            Where.Add(EmployeeCars.EmployeeID.IsEqualTo(EmployeeID));
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }        
    }
}
```
After item **9** The **ShowEmployeeCars** class should look like :
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
            AverageKM.BindValue(() => EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear));
        }

        public void Run(Number EmployeeID)
        {
-           EmployeeCars.EmployeeID.DefaultValue = EmployeeID;
+           EmployeeCars.EmployeeID.BindValue(()=>EmployeeID);
            Where.Add(EmployeeCars.EmployeeID.IsEqualTo(EmployeeID));
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }        
    }
}
```

After item **11** The **ShowEmployeeCars** class should look like :
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
            AverageKM.BindValue(() => EmployeeCars.CarKM / (Date.Now.Year - EmployeeCars.CarYear));
        }

        public void Run(Number EmployeeID)
        {
-           EmployeeCars.EmployeeID.BindValue(()=>EmployeeID);
-           Where.Add(EmployeeCars.EmployeeID.IsEqualTo(EmployeeID));
+           Where.Add(EmployeeCars.EmployeeID.BindEqualTo(EmployeeID));

            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeeCarsView(this);
        }        
    }
}
```