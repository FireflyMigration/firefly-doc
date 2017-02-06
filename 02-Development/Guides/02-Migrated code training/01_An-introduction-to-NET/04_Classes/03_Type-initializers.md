# Type Initializers

```csdiff
-           Animal c = new Animal();
-           c.Name = "Snoopy";
-           c.AnimalType = "Dog";
+           Animal c = new Animal
+           {
+               Name = "Snoopy",
+               AnimalType = "Dog"
+            };
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/RSJOjzJ4Obc?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>


