# Exercise: Car Class

1. Under the **Exercises** folder add new folder name it **MoreOnClass**.
2. Add a new Class name it **TestClass**.
3. Add Run method
4. Call it from the application MDI

Your new Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind.Exercises.MoreOnClass
{
    class TestClass
    {
+        public void Run()
+        {
+
+        }
    }
```

4. Add a new class name it **Car**.
5. Add Run Method
6. Add This members to the Run :
   1. string carName
   2. int carYear
   3. int CarKM
   4. char carType 
 
Your new Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind.Exercises.MoreOnClass
{
    class Car
    {
        public void Run()
        {
+            public string carName;
+            public int carYear;
+            public int CarKM;
+            public string carType;
        }
    }
}
```
7. In the **TestClass** class create 2 new instance of the Car class name it:
   1. MainCar
   2. WeekendCar
8. Set the value of your two new cars to fit your dream cars.
9. Add message box to show the two cars info

Your Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class TestClass
    {
        public void Run()
        {
+           Car mainCar = new Car();
+           Car weekendCar = new Car();
+
+           mainCar.carName = "BMW X6";
+           mainCar.carYear = 2015;
+           mainCar.CarKM = 20000;
+           mainCar.carType = "Main";
+
+           weekendCar.carName = "Ford mustang";
+           weekendCar.carYear = 1965;
+           weekendCar.CarKM = 160000;
+           weekendCar.carType = "Weekend";
+
+           MessageBox.Show("My "+ mainCar.carType + " car is " + mainCar.carYear +" " + mainCar.carName + "\n" +
+               " I drove it for " + mainCar.CarKM + " KM");
+
+           MessageBox.Show("My " + weekendCar.carType + " car is " + weekendCar.carYear + " " + weekendCar.carName + "\n" +
+               " I drove it for " + weekendCar.CarKM + " KM");
        }
    }
}
```
10. Build and test
11. In the **Car** class Add a new method **CarInfo**
12. add a message box to the new method to show the car info
13. In the **TestClass** class replace the message box to use the new method
14. Build and test


Your **Car** Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Car
    {
        public string carName;
        public int carYear;
        public int CarKM;
        public string carType;
+       public void CarInfo()
+       {
+           MessageBox.Show("My " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
+               " I drove it for " + this.CarKM + " KM");
+       }
    }
}
```
Your **TestClass** Class supposed to look like this code:

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
            Car mainCar = new Car();
            Car weekendCar = new Car();

            mainCar.carName = "BMW X6";
            mainCar.carYear = 2015;
            mainCar.CarKM = 20000;
            mainCar.carType = "Main";

            weekendCar.carName = "Ford mustang";
            weekendCar.carYear = 1965;
            weekendCar.CarKM = 160000;
            weekendCar.carType = "Weekend";

-           MessageBox.Show("My "+ mainCar.carType + " car is " + mainCar.carYear +" " + mainCar.carName + "\n" +
-               " I drove it for " + mainCar.CarKM + " KM");
-
-           MessageBox.Show("My " + weekendCar.carType + " car is " + weekendCar.carYear + " " + weekendCar.carName + "\n" +
-               " I drove it for " + weekendCar.CarKM + " KM");
+           mainCar.CarInfo();
+           weekendCar.CarInfo();
        }
    }
}
```