# Generating an Entity class base on existing table in the DB result

The Employees class should look like  :
```csdiff
/* auto generated entity code, 13/04/17 16:16:29*/
using ENV.Data;

namespace Northwind.Models
{
    public class Employees : Entity
    {
        [PrimaryKey]
        public readonly NumberColumn EmployeeID = new NumberColumn("EmployeeID", "10");
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