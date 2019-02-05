* Add a member of type `Index`
* Add the Index columns in the constructor using the Add syntax
* Determine if the Index is unique, using the `Unique` property
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
        public readonly TextColumn FirstName = new TextColumn("FirstName","30");
+       public readonly Index SortById = new Index() { Unique = true };

        public Students()
            : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
+           SortById.Add(Id);
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/i7gVA26K-4w?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>


Another index:
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
        public readonly TextColumn FirstName = new TextColumn("FirstName","30");
        public readonly Index SortById = new Index() { Unique = true };
+       public readonly Index SortByName = new Index() { Unique = true };

        public Students()
            : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
            SortById.Add(Id);

+           SortByName.Add(LastName, FirstName, Id);
        }

    }
}
```
* Use the options, view by key menu entry to select the Index to use

<iframe width="560" height="315" src="https://www.youtube.com/embed/MtXu8RxEZcU?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>
