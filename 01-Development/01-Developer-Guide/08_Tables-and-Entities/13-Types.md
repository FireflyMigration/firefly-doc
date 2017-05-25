* Types are a way to create a common definition for columns and reuse it in multiple entities/scenarios
* For example the migrated Northwind application has the `OrderID` type that isused in the `Orders` class and the `OrderDetails` class
* Go the the "NorthwindBase" project, to the "Types" namespace (Folder)
* Add a new type called "StudentId" using the "Type" template
* Make sure that the base class represents the column type you want (NumberColumn in this case)
* Note that you can create a type based on a type
* Send the Base constructor the `Name` and the `Format` you want for the type.
* Set all the properties in the constructor
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using Firefly.Box;
using ENV.Data;

namespace Northwind.Types
{
    public class StudentId : NumberColumn
    {
+       public StudentId() : base("Id", "5")
        {
+           AllowNull = false;
        }
    }
}

```
Use the type in the "Students" entity
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using Firefly.Box;
using ENV.Data;

namespace Northwind.Models
{
    public class Students : Entity
    {
        [PrimaryKey]
-       public readonly NumberColumn Id = new NumberColumn("Id", "5"){ AllowNull = false };
+       public readonly Types.StudentId Id = new Types.StudentId();
        public readonly TextColumn LastName = new TextColumn("LastName", "30");
        public readonly TextColumn FirstName = new TextColumn("FirstName","30");
        public readonly Index SortById = new Index() { Unique = true };
        public readonly Index SortByName = new Index() { Unique = true };

        public Students()
            : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
            SortById.Add(Id);

            SortByName.Add(LastName, FirstName, Id);
        }

    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/_SU2P6Yaj-I?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>

