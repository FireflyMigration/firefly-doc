* Goto the NorthwindBase project
* To the "Models" namespace
* Add a new item using the "Entity" template and call it "Students"
* See that it inherits from "Entity" base class
* Review the parameters used to call the base constructor (name in db, caption, data provider)
* Change the datasource to: `Shared.Datasources.Northwind1`

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
        public Students()
+           : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/Jlf6ukFv3A0?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe>

