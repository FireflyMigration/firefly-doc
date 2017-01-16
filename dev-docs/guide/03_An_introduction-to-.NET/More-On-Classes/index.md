# More on Classes
In this chapter, we explained classes and instances. So before we start we create a new class 'ClassesAndInstances.cs' inside Training folder and call it into the menu 'Classes and Instances'

ClassesAndInstances.cs :
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

ApplicationMdi.cs
```diff
private void classesAndInstancesToolStripMenuItem_Click(object sender, EventArgs e)
{
	new Training.ClassesAndInstances().Run();
}
```

A class is a collection of operations and data, we want demonstrating in an other class it calls it Animal.cs and we put some informations on this class with a member

```diff
namespace Northwind.Training
{
    class Animal
    {
+       public void Run()
+       {
+           public string Name;
+       }     
    }
}
```

And go back to ClassesAndInstances.cs

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
Build it and run it, you have two messages box are opening with Rex then Kitty.
By doing a `new Animal()`, we define a new object in the memory, a new instance of the class Animal
Creating a instance allows you to separate or organize your data in your code. Now, you can add an other property as:
 Animal.cs
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

ClassesAndInstances.cs

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
Build it, run it, and check you received two message box "Rex is a Dog" and "Kitty is a Cat".
Go back to the Animal class, and declare a method who return the message box.
 Animal.cs
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
+           MessageBox.Show(this.Name+" is a "+this.AnimalType); 
+          }  
       }     
    }
}
```
`this` is referencing to the current instance of the Animal class, so now you can write 
ClassesAndInstances.cs

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

In brief, we moved the logic description from the outside code into the Animal class itself.