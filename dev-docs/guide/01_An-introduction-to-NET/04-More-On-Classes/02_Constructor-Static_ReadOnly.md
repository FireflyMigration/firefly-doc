
# More on Classes - constructor static and readonly

In previous lesson we created 2 instances of Animal - 'a' & 'b'  
To create them we used the **new** keyword and the class name Animal with the brackets at the end.  
Animal a = new Animal()  

Whenever we see the Brackets - we know we are calling a method.

A method having the name of the Class is a special method called **Constructor**.  


**Constructor**  
To create new instance of a class we need to call the constructor of the class.  
If we don't define a constructor, a constructor is automatically created.  

Rules related to Constructor:
1. A constructor doesn't have a return type
2. Its name is the same name as the Class where it is defined.  

In the constructor we can set default values to the class members
For example in the code below  
In the Animal class we created a constructor and in the constructor define default values for the 'Name' & 'AnimalType' member.  
If a new instance is created and no value is set to its Name and Type members - they will hold the default values as defined in the constructor


 ```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    class Animal
    {
       public void Run()
       {
           public string Name;
           public string AnimalType;
+          public Animal()
+          {
+               Name = "No name was given";
+               AnimalType = "No type was given";
+          }
           public void DescribeYourSelf()
           {
            MessageBox.Show(this.Name+" is a "+this.AnimalType); 
           }  
       }     
    }
}
```



**Static**  

A static member of a class is shared by all the class instances.  
a static member is created once and not for each instance and it can be accessed by the class and not by the instance itself.  

When do we use static members?
usually to count the number of instances or to share a value between all instances.

let's see example for that  
In the Animal class a new static member from type int is added:  
static int LastUsedId =0;  

We also added a new member (which is not public) called Id:  
public int Id;   

In the constructor we will increase the value of the static member by 1 -   
so every type a new instance of the Animal class is created the value of the static member is increased by 1.  

Then, we set the value of the LastUsedId (the static member) to the Id.  
That way - every new instance of the class will receive a new and unique id.  
 
The code below also display the id in the DescribeYouSlef() method:  
 ```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    class Animal
    {
       public void Run()
       {
+          static int LastUsedId =0;
+          public int Id;            
           public string Name;
           public string AnimalType;
           public Animal()
           {
+               LastUsedId++;        
+               Id = LastUsedId;    
                Name = "No name was given";
                AnimalType = "No type was given";
           }
           public void DescribeYourSelf()
           {
-           MessageBox.Show(this.Name+" is a "+this.AnimalType); 
+           MessageBox.Show(this.Name+" is a "+this.AnimalType+ " and it's id is :"+ Id );
           }  
       }     
    }
}
```


**readonly**  

In some cases you would like to prevent the developer from updating a value of a variable.  
For those cases we have the readonly key word.  

With the example above we don't want to allow the developer to set a value for the Id.
The Id should be set automatically in the constructor and we don't want to take the chance that it will be updated in any other place in the code.  

readonly means that a variable can only be updated inside the constructor but not anywhere else in the code.  

By setting the Id to readonly:  public readonly int Id;  
we make sure the Id is updated in the constructor and cannot be updated anywhere else.  
That helps us making sure the Id stays unique and cannot be modified.  
If we try to set a value to the Id we will receive a compilation error in Visual studio.  




<iframe width="560" height="315" src="https://www.youtube.com/embed/pyuGLDnGk2U?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>