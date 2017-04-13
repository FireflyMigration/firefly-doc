# Create new Entity result

The **EmployeeCars** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using Firefly.Box;
using ENV.Data;

namespace Northwind.Models
{
    public class EmployeeCars : Entity
    {
        [PrimaryKey]
        public readonly NumberColumn EmployeeID = new NumberColumn("EmployeeID","6", "Employee ID");
        [PrimaryKey]
        public readonly NumberColumn CarID = new NumberColumn("CarID","6","Car ID");
        public readonly TextColumn CarManufacture = new TextColumn("CarManufacture","30", "Car Manufacture");
        public readonly TextColumn CarName = new TextColumn("CarName","30", "Car Name");
        public readonly NumberColumn CarYear = new NumberColumn("CarYear","4", "Car Year");
        public readonly NumberColumn CarKM = new NumberColumn("CarKM","6.2C","Car KM");
        public EmployeeCars()
            : base("EmployeeCars", Northwind.Shared.DataSources.Northwind1)
        {
        }

    }
}

```