# Types

The **EmployeeID** type class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using Firefly.Box;
using ENV.Data;

namespace Northwind.Types
{
    public class EmployeeID : NumberColumn
    {
        public EmployeeID() : base("EmployeeID", "10", "Employee ID")
        {
        }
    }
}
```
The **CarID** type class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using Firefly.Box;
using ENV.Data;

namespace Northwind.Types
{
    public class CarID : NumberColumn
    {
        public CarID() : base("CarID", "6", "Car ID")
        {
        }
    }
}
```
The **Employees** Entity class should look like :
```csdiff
/* auto generated entity code, 13/04/17 16:16:29*/
using ENV.Data;

namespace Northwind.Models
{
    public class Employees : Entity
    {
        [PrimaryKey]
-       public readonly NumberColumn EmployeeID = new NumberColumn("EmployeeID", "10");
+       public readonly Types.EmployeeID EmployeeID = new Types.EmployeeID();
        public readonly TextColumn LastName = new TextColumn("LastName", "20");
        public readonly TextColumn FirstName = new TextColumn("FirstName", "10");
        public readonly TextColumn Title = new TextColumn("Title", "30");
        public readonly TextColumn TitleOfCourtesy = new TextColumn("TitleOfCourtesy", "25");
        public readonly DateColumn BirthDate = new DateColumn("BirthDate");
        public readonly DateColumn HireDate = new DateColumn("HireDate");
        public readonly TextColumn Address = new TextColumn("Address", "60");
        public readonly TextColumn City = new TextColumn("City", "15");
        public readonly TextColumn Region = new TextColumn("Region", "15");
        public readonly TextColumn PostalCode = new TextColumn("PostalCode", "10");
        public readonly TextColumn Country = new TextColumn("Country", "15");
        public readonly TextColumn HomePhone = new TextColumn("HomePhone", "24");
        public readonly TextColumn Extension = new TextColumn("Extension", "4");
        public readonly TextColumn Notes = new TextColumn("Notes", "500");
        public readonly NumberColumn ReportsTo = new NumberColumn("ReportsTo", "10");
        public readonly TextColumn PhotoPath = new TextColumn("PhotoPath", "255");

        #region Indexes
        public readonly Index SortByPK_Employees = new Index
        {
            Name = "PK_Employees",
            Unique = true
        };
        #endregion

        public Employees() : base("Employees", Northwind.Shared.DataSources.Northwind1)
        {
            SortByPK_Employees.Add(EmployeeID);
        }
    }
}
```
The **EmployeeCars** Entity class should look like :
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
-       public readonly NumberColumn EmployeeID = new NumberColumn("EmployeeID","6", "Employee ID");
+       public readonly Types.EmployeeID EmployeeID = new Types.EmployeeID();
        [PrimaryKey]
-       public readonly NumberColumn CarID = new NumberColumn("CarID","6","Car ID");
+       public readonly Types.CarID CarID = new Types.CarID();
        public readonly TextColumn CarManufacture = new TextColumn("CarManufacture","30", "Car Manufacture");
        public readonly TextColumn CarName = new TextColumn("CarName","30", "Car Name");
        public readonly NumberColumn CarYear = new NumberColumn("CarYear","4", "Car Year");
        public readonly NumberColumn CarKM = new NumberColumn("CarKM","6.2C","Car KM");

        public readonly Index SortByEmployeeID = new Index();
        public readonly Index SortByCarManufacture = new Index();

        public EmployeeCars()
            : base("EmployeeCars", Northwind.Shared.DataSources.Northwind1)
        {
            SortByEmployeeID.Add(EmployeeID, CarID);
            SortByCarManufacture.Add(CarManufacture);
        }

    }
}
```