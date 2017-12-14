#	Exercise: Operators 
1.	In **DataTypes** and add a new variable, name **currentYear**. Set its value to the current year.
2.	Add a new variable named carAvgKmPerYear that will hold the average KM per year that the car has run.
3.	Add the new variable (carAvgKmPerYear) to the message box.
4.	Build and test.
Your **DataTypes** Class supposed to look like this code:
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind.Exercises
{
    class DataTypes
    {
        public void Run()
        {
            string carName = "Mini";
            int carYear = 2015;
            int CarKM = 20000;
            char carGroup = 'A';
+           int currentYear = 2017;
+           int carAvgKmPerYear = CarKM/ (currentYear - carYear);
-           System.Windows.Forms.MessageBox.Show("My car is a " + carName +"\nit's from year "+carYear+"\nI already drove it for "+CarKM );
+           System.Windows.Forms.MessageBox.Show("My car is a " + carName +"\nit's from year "+carYear+"\nI already drove it for "+CarKM +"\nI drive my car on average of "+carAvgKmPerYear+" Km per year");
        }
    }
}
```