* Column Prperties can be set using it's type initializer, for example:
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
+       public readonly NumberColumn Id = new NumberColumn("Id", "5"){ AllowNull = false };
        public readonly TextColumn LastName = new TextColumn("LastName", "30");
        public readonly TextColumn FirstName = new TextColumn("FirstName", "30");
        public Students()
           : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
        }
    }
}
```
* Among the properties you'll find:
    * Name - the column name in the database
    * Caption - the column's caption
    * AllowNull
    * Format - see [formatting](formatting.html)
    * Storage - the way the column will be stored in the database
    * StorageType - the way a TextColumn will be stored in the database (unicode etc...)
* Properties can also be set in the constructor:
* 

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
        public readonly NumberColumn Id = new NumberColumn("Id", "5"){ AllowNull = false };
        public readonly TextColumn LastName = new TextColumn("LastName", "30");
        public readonly TextColumn FirstName = new TextColumn("FirstName", "30");
        public Students()
           : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
+           LastName.StatusTip = "Bla Bla";
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/OZrBp1qoaqE?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>

