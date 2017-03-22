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
6. In the **TestClass** change the first 2 cars declarations to use the right class.
7. Remove the carType update from the first 2 cars declarations.
8. Add a call to the cars **DriveFast** method and the **DriveInStyle** method.
9. Notice that:  
     1. **mainCar** do not have the **DriveInStyle** method.
     1. **weekendCar** do not have the**DriveFast** method.
     1. **funCar** do not have any of the above methods.
10. Build and Test.

The **TestClass** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class TestClass
    {
        public void Run()
        {
-           var mainCar = new Car {carName = "BMW X6",carYear = 2015,CarKM = 20000,carType = "Main" };
+           var mainCar = new Main {carName = "BMW X6",carYear = 2015,CarKM = 20000};
-           var weekendCar = new Car {carName = "Ford mustang",carYear = 1965,CarKM = 160000,carType = "Weekend" };
+           var weekendCar = new Weekend {carName = "Ford mustang",carYear = 1965,CarKM = 160000};
            var funCar = new Car();

            mainCar.CarInfo();
+           mainCar.DriveFast();
            weekendCar.CarInfo();
+           weekendCar.DriveInStyle();
            funCar.CarInfo();
        }
    }
}
```