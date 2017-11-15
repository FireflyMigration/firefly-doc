# Creating the Cat Class 

#### the Cat Class
```csdiff
class Cat:Animal
{
    public Cat()
    {
        AnimalType = "Cat";
    }
    public void Sleep()
    {
        MessageBox.Show("Sleeping ZZZ");
    }
}
```

```csdiff
-   var b = new Animal();
+   var b = new Cat();
+   b.Sleep();
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/BG7pTYBSH_U?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>


