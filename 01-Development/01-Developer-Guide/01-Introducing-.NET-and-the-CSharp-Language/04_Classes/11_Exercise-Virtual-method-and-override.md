# Exercise: Virtual method and override

1. In **Car** class add a new virtual method name it **RoofType**.
2. In **Main** Override the **RoofType** show message box : **"Sunroofs"**. 
3. In **Weekend** Override the **RoofType** show message box : **"Convertible"**.
4. In **TestClass** call the **RoofType** for the first two cars declarations.

The **Car** class should look like :
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
        public readonly int Id;

        public Car()
        {
            CarCounter++;
            Id = CarCounter;
            carName = "No name given";
            carYear = 0;
            CarKM = 0;
            carType = "No type given";
        }
        public void CarInfo() => MessageBox.Show("My number"+ this.Id + " " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" + " I drove it for " + this.CarKM + " KM");
+       public virtual void RoofType()
+       {
+
+       }
    }
}
```
The **Main** class should look like :
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
        public Main()
        {
            carType = "Main";
        }
        public void DriveFast()
        {
            MessageBox.Show("Whoop I am fast");
        }
+       public override void RoofType()
+       {
+           MessageBox.Show("Sunroofs");
+       }
    }
}

```
The **Weekend** class should look like :
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
        public Weekend()
        {
            carType = "Weekend";
        }
        public void DriveInStyle()
        {
            MessageBox.Show("I am cruising on the highway");
        }
+       public override void RoofType()
+       {
+           MessageBox.Show("Convertible");
+       }
    }
}
```
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
            var mainCar = new Main {carName = "BMW X6",carYear = 2015,CarKM = 20000};
            var weekendCar = new Weekend {carName = "Ford mustang",carYear = 1965,CarKM = 160000};
            var funCar = new Car();

            mainCar.CarInfo();
            mainCar.DriveFast();
+           mainCar.RoofType();
            weekendCar.CarInfo();
            weekendCar.DriveInStyle();
+           weekendCar.RoofType();
            funCar.CarInfo();
        }
    }
}
```