# Exercise - Migrated-Style-Parameters result

The **ShowEmployee** class should look like :
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
    public class ShowEmployees : UIControllerBase
    {

        public readonly Models.Employees Employees = new Models.Employees();
        public readonly NumberColumn NumberOfCars = new NumberColumn();
        public readonly NumberColumn LatesModel = new NumberColumn();

        public ShowEmployees()
        {
            From = Employees;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowEmployeesView(this);
        }

       protected override void OnEnterRow()
       {
-           new GetCarsInfo(this).Run();
+           Cached<GetCarsInfo>().Run();
       }
 
       class GetCarsInfo : BusinessProcessBase
       {
           public readonly Models.EmployeeCars EmployeeCars = new Models.EmployeeCars();
 
           ShowEmployees _parent;
           public GetCarsInfo(ShowEmployees parent)
           {
               _parent = parent;
               From = EmployeeCars;
               Where.Add(EmployeeCars.EmployeeID.IsEqualTo(_parent.Employees.EmployeeID));
           }
           public void Run()
           {
               _parent.NumberOfCars.Value = 0;
               _parent.LatesModel.Value = 0;
               Execute();
           }
           protected override void OnLoad()
           {
 
           }
           protected override void OnEnterRow()
           {
               _parent.NumberOfCars.Value++;
               if (EmployeeCars.CarYear > _parent.LatesModel)
                   _parent.LatesModel.Value = EmployeeCars.CarYear;
           }
       }
    }
}
```