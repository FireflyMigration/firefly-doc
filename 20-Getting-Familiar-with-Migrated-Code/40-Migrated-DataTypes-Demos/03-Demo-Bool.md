# Bool - Demo

```csdiff
using Firefly.Box;
using System.Diagnostics;

namespace Northwind.Training
{
    class DemoBool
    {
        public void Run()
        {
            bool b1=false;
            Bool b2 =null ;
            Bool b3 = true;
            Bool b4 = false;

            if (b3)
                Debug.WriteLine("b3 is true");
            if (!b4)
                Debug.WriteLine("not b4 is actually true - because b4 is false");
            if (b2)
                Debug.WriteLine("b2 is null and is regarded as true");
            else
                Debug.WriteLine("b2 is null and is regarded as false");
        }
    }
}

```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/aix27HEnOAI?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>

