# Exercise: Inheritance_Basics

1. Under **Exercises** folder and under the **MoreOnClass** folder Create two new class :
   1. **Main** inheriting from **Car**. 
   2. **Weekend** inheriting from **Car**. 

Your new two class should look like :
```csdiff
+using System;
+using System.Collections.Generic;
+using System.Linq;
+using System.Text;
+using System.Threading.Tasks;
+
+namespace Northwind.Exercises.MoreOnClass
+{
+    class Main : Car
+    {
+    }
+}
```
```csdiff
+using System;
+using System.Collections.Generic;
+using System.Linq;
+using System.Text;
+using System.Threading.Tasks;
+
+namespace Northwind.Exercises.MoreOnClass
+{
+    class Weekend : Car
+    {
+    }
+}
```
2. Add to the **Main** class, a new method name it **DriveFast**, the new method will show a message "Whoop I am fast".
3. Add to the **Weekend** class, a new method name it **DriveInStyle**, the new method will show a message "I am cruising on the highway".  

The two class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Main : Car
    {
+       public void DriveFast()
+       {
+           MessageBox.Show("Whoop I am fast");
+       }
    }
}

```
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Weekend : Car
    {
+       public void DriveInStyle()
+       {
+           MessageBox.Show("I am cruising on the highway");
+       }
    }
}
```

4. Add **constructor** to the two class.
5. In the **constructors** initialize the **carType**.
The two class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Main : Car
    {
+        public Main()
+        {
+            carType = "Main";
+        }
        public void DriveFast()
        {
            MessageBox.Show("Whoop I am fast");
        }
    }
}

```
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Weekend : Car
    {
+        public Weekend()
+        {
+            carType = "Weekend";
+        }
        public void DriveInStyle()
        {
            MessageBox.Show("I am cruising on the highway");
        }
    }
}
```
6. In the **TesClass** change Remove the carType set value from the **TestClass**.