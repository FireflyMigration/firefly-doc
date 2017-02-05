# Type Initializers

```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
        public void Run()
        {
-           Animal a = new Animal();
+           Animal a = new Animal
-           a.Name = "Rex";
-           a.AnimalType = "Dog";
-           Animal b = new Animal();
+           { Name = "Rex", AnimalType = "Dog" };
-           b.Name = "Kitty";
-           b.AnimalType = "Cat";
+           {
+               Name = "Kitty",
+               AnimalType = "Cat"
+           };

            a.DescribeYourself();
            b.DescribeYourself();

-           Animal c = new Animal();
-           c.Name = "Snoopy";
-           c.AnimalType = "Dog";
+           Animal c = new Animal
+           {
+               Name = "Snoopy",
+               AnimalType = "Dog"
+            };
           
            c.DescribeYourself();
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/RSJOjzJ4Obc?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>


