# Exercise: Constructors Static and ReadOnly

## Constructors
1. Add a constructor to the **Car** class.
2. Initialize the value of all the variables.
3. In the **TestClass** add one more car instance.
4. Call the **CarInfo** method of the new car.
5. Build and Test.

Your **Car** class supposed to look like this code:
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Car
    {
        public string carName;
        public int carYear;
        public int CarKM;
        public string carType;
+       public Car()
+       {
+           carName = "No name given";
+           carYear = 0;
+           CarKM = 0;
+           carType = "No type given";
+       }
        public void CarInfo()
        {
            MessageBox.Show("My " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
                " I drove it for " + this.CarKM + " KM");
        }
    }
}
```
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
            Car mainCar = new Car();
            Car weekendCar = new Car();
+           Car funCar = new Car();

            mainCar.carName = "BMW X6";
            mainCar.carYear = 2015;
            mainCar.CarKM = 20000;
            mainCar.carType = "Main";

            weekendCar.carName = "Ford mustang";
            weekendCar.carYear = 1965;
            weekendCar.CarKM = 160000;
            weekendCar.carType = "Weekend";

            mainCar.CarInfo();
            weekendCar.CarInfo();
+           funCar.CarInfo();
        }
    
```

## Static
1. In the **Car** class:
   1. Add static variable type **int** name it **CarCounter**.
   1. Add variable type **int** name it **Id**.
3. In the class **constructor**:
   1. Set the **CarCounter** to increase by one.
   1. In the Class **constructor** set the **Id** value to the value of the **CarCounter**.
5. Change the **CarInfo** method to reflect the new **Id** in the message box.
6. Build and Test

Your **Car** class supposed to look like this code:
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Car
    {
        public string carName;
        public int carYear;
        public int CarKM;
        public string carType;
+       static int CarCounter=0;
+       public int Id;

        public Car()
        {
+           CarCounter++;
+           Id = CarCounter;
            carName = "No name given";
            carYear = 0;
            CarKM = 0;
            carType = "No type given";
        }
        public void CarInfo()
        {
-           MessageBox.Show("My " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
-               " I drove it for " + this.CarKM + " KM");
+           MessageBox.Show("My number"+ this.Id + " " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
+               " I drove it for " + this.CarKM + " KM");
        }
    }
}
```

## ReadOnly
1. In the **TestClass** class Try to update the Id of one of the cars to 10.
2. Build and test.
3. In the **car** class change the **Id** variable to readonly.
4. Notice the error message in the **TestClass** class.
5. Delete the update of the **Id** from the **TestClass**.
6. Build and test.

Your **Car** class supposed to look like this code:
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises.MoreOnClass
{
    class Car
    {
        public string carName;
        public int carYear;
        public int CarKM;
        public string carType;
        static int CarCounter=0;
+       public readonly int Id;

        public Car()
        {
            CarCounter++;
            Id = CarCounter;
            carName = "No name given";
            carYear = 0;
            CarKM = 0;
            carType = "No type given";
        }
        public void CarInfo()
        {
            MessageBox.Show("My number"+ this.Id + " " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
                " I drove it for " + this.CarKM + " KM");
        }
    }
}
```
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
            Car mainCar = new Car();
            Car weekendCar = new Car();
            Car funCar = new Car();

            mainCar.carName = "BMW X6";
            mainCar.carYear = 2015;
            mainCar.CarKM = 20000;
            mainCar.carType = "Main";

            weekendCar.carName = "Ford mustang";
            weekendCar.carYear = 1965;
            weekendCar.CarKM = 160000;
            weekendCar.carType = "Weekend";

-           mainCar.Id = 10;
            mainCar.CarInfo();
            weekendCar.CarInfo();
            funCar.CarInfo();
        }
    }
}
```