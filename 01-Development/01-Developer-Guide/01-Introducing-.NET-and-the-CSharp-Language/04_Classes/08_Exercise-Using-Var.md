# Exercise: Using Vars

1. In the **TestClass** change all the 3 declarations of your cars to user var instead of the Car type.

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
-           Car mainCar = new Car {carName = "BMW X6",carYear = 2015,CarKM = 20000,carType = "Main" };
-           Car weekendCar = new Car {carName = "Ford mustang",carYear = 1965,CarKM = 160000,carType = "Weekend" };
-           Car funCar = new Car();

+           Var mainCar = new Car {carName = "BMW X6",carYear = 2015,CarKM = 20000,carType = "Main" };
+           Var weekendCar = new Car {carName = "Ford mustang",carYear = 1965,CarKM = 160000,carType = "Weekend" };
+           Var funCar = new Car();


            mainCar.CarInfo();
            weekendCar.CarInfo();
            funCar.CarInfo();
        }
    }
}
```