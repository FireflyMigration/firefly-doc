# Exercise: Type initializers

1. In the **TestClass** move all the variable values update to be set as type initializer.

Your **TestClass** class supposed to look like this code:
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
+           Car mainCar = new Car {carName = "BMW X6",carYear = 2015,CarKM = 20000,carType = "Main" };
+           Car weekendCar = new Car {carName = "Ford mustang",carYear = 1965,CarKM = 160000,carType = "Weekend" };
+           Car funCar = new Car();

-           mainCar.carName = "BMW X6";
-           mainCar.carYear = 2015;
-           mainCar.CarKM = 20000;
-           mainCar.carType = "Main";
-
-           weekendCar.carName = "Ford mustang";
-           weekendCar.carYear = 1965;
-           weekendCar.CarKM = 160000;
-           weekendCar.carType = "Weekend";

            mainCar.CarInfo();
            weekendCar.CarInfo();
            funCar.CarInfo();
        }
    }
}
```