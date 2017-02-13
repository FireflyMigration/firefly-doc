# Migrated data types & Null

**Introduction to Nulls**
```csdiff
using System.Diagnostics;
namespace Northwind.Training
{
    class DemoNulls
    {
+       string s;
+       public DemoNulls()
+       {
+           s = "Default Value";
+       }
        
        public void Run()
        {
+            s.ToString();
        }
    }
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/9fawzsxoiiI?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>


---
[Migrated Data Types presentation slides](MigratedDataTypes.pptx)