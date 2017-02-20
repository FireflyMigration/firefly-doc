In this article we'll:
* Add a virtual method called "MakeSound" to the `Animal` base class.
* Override the `MakeSound` method with specific implementation for the Cat and the Dog Classes.

### Animal Class
```csdiff
class Animal
{
+   public virtual void MakeSound()
+   {
+   
+   }
}
```

### Dog Class
```csdiff
class Dog:Animal
{
+   public override void MakeSound()
+   {
+       MessageBox.Show("Hav Hav");
+   }
}
```

### Cat Class
```csdiff
class Cat:Animal
{
+   public override void MakeSound()
+   {
+       MessageBox.Show("Miaoo");
+   }
}
```
 
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/K9xJh8fQEik?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

