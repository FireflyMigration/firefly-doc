* Add a new `NumberColumn` named Id.
* In the call to the `NumberColumn` constructor, we'll set the column's name in the database and it's format.  To read more about formats go to [formatting](formatting.html)
* The member should be `public` so that we can access it from any class in our code.
* The member should be `readonly` to make sure that no one will replace it's reference by mistake - note that it doesn't make the column itself readonly, only makes sure that we'll not replace the reference stored in the Id field. For more info see:[Constructors Static and Readonly](constructors-static-and-readonly.html)

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
+       public readonly NumberColumn Id = new NumberColumn("Id", "5");
        public Students()
           : base("Students", Northwind.Shared.DataSources.Northwind1)
        {
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/qlOMtv2X68A?list=PL1DEQjXG2xnItyh3tX-1kfE3K50w48PNA" frameborder="0" allowfullscreen></iframe> 