# Inheritance Basics - Adding the Dog class 

In this article we'll:
* Create a specific Dog class that inherits from the Animal base class.
* Add the Dog specific method `WatchHouse` to the dog class.

#### Dog class :
```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
+   class Dog:Animal
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
+    a.WatchHouse();
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/ai0m24Oy6nY?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

