# More on Null

```csdiff
using System.Diagnostics;
using System;
using Firefly.Box;
namespace Northwind.Training
{
    class DemoNulls
    {
-       string s;
-       public DemoNulls()
-       {
-           s = "Default Value";
-       }

        public void Run()
        {
+           string s=null;
+           int i = null;
+           decimal d = null;
+           DateTime dt = null;
+           SortDirection sd = SortDirection.Ascending;

            s.ToString();
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/SHTubP30rRY?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>

