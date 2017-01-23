# More on Classes
In this chapter, we will discuss more about Classes and instances.  

The C# code is written inside classes.  
Class is a **collection of operations and Data**.  

The data and the operations are defined between the curly brackets of the class.  
The curly brackets defined where it starts and where it ends – this is the Class scope.  
Members defined inside a class are known only in that class.  

The same goes for Method - Variables defined inside a method are only known inside this method.



Below you can see the code of 2 different classes: 
1. Class called ClassesAndInstances
2. Class called Animal 


```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
+       public void Run()
+       {
+       }     
    }
}
```


```diff
namespace Northwind.Training
{
    class Animal
    {
        public string Name;

+       public void Run()
+       {
+           
+       }     
    }
}
```

The Animal class has a member defined called Name.  
This member is:  
**public** -  so it is accessible from all our code  
Its **type** is string
and its name is Name  


In the ClassesAndInstances class we can define an instance of the Animal class.  
meaning - the ClassesAndInstances class has a member from Animal class.  

To use this member in the ClassesAndInstances class we need to create a new instance of it:  
Animal a = new Animal();  

By using the **new** keyword a new instance of the class is created  
This instance is represented by the variable a  
 
Since a is an Animal it has a member called Name (as defined in the Animal class).  
To set a value to the Name of a we use the className.MemberName, and with this sample:  
a.Name = "Rexi"




```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
       public void Run()
       {
+            Animal a = new Animal();
+            Animal b = new Animal();
+            a.Name = "Rex";
+            b.Name = "Kitty";
+            MessageBox.Show(a.Name); 
+            MessageBox.Show(b.Name); 
       }     
    }
}
```


The code above defines two instances of Animal class a & b.  
The Name of 'a' is "Rexi" the name of 'b' is "Kitty".  
Then we use the MessageBox.Show() method to display the name of each of the Animals.

Note: to access a member of a class (properties, variables, methods) we use the class instance.member 



**new** keyword  
By using the new keyword a new instance of the object is created in the memory.







Back to the Animal class:
A new member is added to that animal class: AnimalType


 ```diff
namespace Northwind.Training
{
    class Animal
    {
       public void Run()
       {
           public string Name;
+          public string AnimalType;
       }     
    }
}
```


In the ClassesAndInstances we set a (which is an instance of Animal) to be have AnimalTypa - Dog  
and b  (which is also an instance of Animal) to have AnimalTypa - Cat.  
The message boxes displays the type and the name of the objects a & b


```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
       public void Run()
       {
            Animal a = new Animal();
            Animal b = new Animal();
            a.Name = "Rex";
+           b.AnimalType = "Dog" ;
            b.Name = "Kitty";
+           b.AnimalType = "Cat" ;
-           MessageBox.Show(a.Name); 
+           MessageBox.Show(a.Name+" is a "+a.AnimalType); 
-            MessageBox.Show(b.Name); 
+           MessageBox.Show(b.Name+" is a "+b.AnimalType); 
       }     
    }
}
```


Instead of using the message box to display the Name and the Type for a and for b in the in the  
ClassesAndInstances, we can add a method in the Animal class to do that and call this method. 

The method DescribeYourSelf() is added to the Animal class and it display the name and the type of the Animal object.   
`this` is a reference to the current instance of the object (Animal class).  
 The code looks like that:  

 ```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    class Animal
    {
       public void Run()
       {
           public string Name;
           public string AnimalType;
+          public void DescribeYourSelf()
+          {
+               MessageBox.Show(this.Name+" is a "+this.AnimalType); 
+          }  
       }     
    }
}
```


This method DescribeYourSelf() belong to the class so every object representing this class can use it.  
So now, in the ClassesAndInstances, instead of using the message box a object and b object can call the method to display the information.  



```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    class ClassesAndInstances
    {
       public void Run() 
       {
            Animal a = new Animal();
            Animal b = new Animal();
            a.Name = "Rex";
            b.AnimalType = "Dog" ;
            b.Name = "Kitty";
            b.AnimalType = "Cat" ;
-           MessageBox.Show(a.Name+" is a "+a.AnimalType); 
+           a.DescribeYourSelf();
-           MessageBox.Show(b.Name+" is a "+b.AnimalType); 
+           b.DescribeYourSelf();
       }     
    }
}
```

We Created a class representing an Animal  
It has 3 members:
2 fields - Name and Type and a Method that displays the name and the type of the animal  

In the second class which called ClassesAndInstances we created 2 objects of the Animal Class a & b.  
a is set with Name = Rexi and AnimalType = Dog
b is set with Name = Kitty and AnimalType = Cat
Both object use their DescribeYourSelf() method (the Animal class method) to display the information.


<iframe width="560" height="315" src="https://www.youtube.com/embed/v6wbQgPYwU0?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
