# using var

When using var the developer doesn't need to specify the variable's type.  
That means the compiler will determines the explicit type if the variable, based on the usage.  
```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
        public void Run()
        {
-           Animal a = new Animal
+           var a = new Animal
            { Name = "Rex", AnimalType = "Dog" };
-           Animal b = new Animal
+           var b = new Animal
            {
                Name = "Kitty",
                AnimalType = "Cat"
            };
            a.DescribeYourself();
            b.DescribeYourself();
-           Animal c = new Animal
+           var c = new Animal
            {
                Name = "Snoopy",
                AnimalType = "Dog"
            };
            c.DescribeYourself();
        }
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/z0aQ1d9MSnU?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
