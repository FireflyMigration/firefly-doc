# using var

When using var the developer doesn't need to specify the variable's type.  
That means the compiler will determines the explicit type if the variable, based on the usage.  
```csdiff
-           Animal c = new Animal
+           var c = new Animal
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/z0aQ1d9MSnU?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
