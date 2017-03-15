keywords:primarykey 
**PrimaryKey** - The combination of columns that represents a unique identifier for a row. 
*  In other words - how can the code identify one single row.
*  The **PrimaryKey** is used whenever the code needs to identify a unique row, for example when performing an "Update" or "Delete" or "Lock" operation.
* We can highlight more than one column using the **PrimaryKey** attribute, and all the highlighted columns will be used.
* We'll use the **[PrimaryKey]**  attribute to highlight the column(s)

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
+       [PrimaryKey]
        public readonly NumberColumn Id = new NumberColumn("Id", "5");
        public readonly TextColumn LastName = new TextColumn("LastName", "30");
        public readonly TextColumn FirstName = new TextColumn("FirstName", "30");
        public Students()
           : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/T3M-1XzPcs0?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>

