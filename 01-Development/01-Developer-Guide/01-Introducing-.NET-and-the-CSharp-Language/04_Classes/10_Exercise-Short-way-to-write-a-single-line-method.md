# Exercise: Short Way to Write a single line method

1. In the **Car** class change the CarInfo method to the shorer style.

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
+       public void CarInfo() => MessageBox.Show("My number"+ this.Id + " " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" + " I drove it for " + this.CarKM + " KM");
-       public void CarInfo()
-       {
-           MessageBox.Show("My number"+ this.Id + " " + this.carType + " car is " + this.carYear + " " + this.carName + "\n" +
-               " I drove it for " + this.CarKM + " KM");
-       }
    }
}
```