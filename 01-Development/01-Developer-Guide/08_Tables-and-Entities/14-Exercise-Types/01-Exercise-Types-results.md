# Types

The **Territories** class should look like :
```csdiff
/* auto generated entity code, 13/04/17 15:54:23*/
using ENV.Data;

namespace Northwind.Models
{
    public class Territories : Entity
    {
        [PrimaryKey]
        public readonly NumberColumn TerritoryID = new NumberColumn("TerritoryID", "10");
        public readonly TextColumn TerritoryDescription = new TextColumn("TerritoryDescription", "50")
        {
            StorageType = TextStorageType.Unicode
        };
        public readonly NumberColumn RegionID = new NumberColumn("RegionID", "10");


        public Territories() : base("Territories", Northwind.Shared.DataSources.Northwind1)
        {
        }
    }
}
```