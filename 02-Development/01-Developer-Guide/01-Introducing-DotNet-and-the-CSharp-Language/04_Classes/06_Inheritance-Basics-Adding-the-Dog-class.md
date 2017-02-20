# Inheritance Basics - Adding the Dog class 

#### Dog.cs :
```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
    class Dog:Animal
    {
        public void WatchHouse()
        {
            MessageBox.Show("Watching carefully");
        }
    }
}

```

replace Animal by Dog class : 
```csdiff
public void Run()
{
-    var a = new Animal();
+    var a = new Dog();
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/ai0m24Oy6nY?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

