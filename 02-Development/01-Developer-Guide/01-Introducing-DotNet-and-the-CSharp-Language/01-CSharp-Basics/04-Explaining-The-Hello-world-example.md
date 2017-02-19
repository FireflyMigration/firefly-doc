In this video and article we explain the code we wrote in the hello world example


<iframe width="560" height="315" src="https://www.youtube.com/embed/X_8GeOvDMaM?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>


* [CSharp Basics PowerPoint Slides](CSharp-Basics.pptx)
* [Access Modifier Power Point Slides](AccessModifiers.pptx)

Review the actual code:

The code is organized by Namespace, Class and Method.  
Code that is actually executed can only be defined inside Methods.  

In the HelloWorld sample we created a new class and we defined a method inside this class  
The Run method is part of the HelloWorld class  
The Namespace of the HelloWorld class is Northwind.Training  

###### Namespaces  
Namespaces are used to organize the classes.  
They used as the address of the class inside the solution.  
The class HelloWorld is saved at Training folder under the Northwind solution.  

###### Classes  
With C#, code can be written only inside classes.  
Class can contains Members such – Methods, properties, fields and more  
The class HelloWorld contains a Method called Run() 
Inside the Method we called another method called Show()  
and we sent the text to be displayed as parameter to the method.

###### Method  
Method contains to code that is executed once the method is called.  
The Run() method executes one line of code – it calls the Show() method   

###### The method header definition:  

*Access modifier* - Access modifier is a keyword used  to specify the accessibility level of the method (or a class)
It defined which code can see or use the method (or class)  
There are Four access modifiers :  
 * `private` –  visible to members within this class and inner classes  
 * `protected` – visible to members within this class and those which are inherits from this class   
 * `internal` – visible to any code within my assembly (dll/exe)  
 * `public` – visible to any code.  
The Run() used in the HelloWorld has public access modifier.  

See also [Access Modifier Power Point Slides](AccessModifiers.pptx)

*Return value* - Method can return a value to the caller
The return value type should be define in the Method header before the Method name
void is specify when a method doesn’t return a value   
The Run() used in the HelloWorld has no return value so we specify void.  

*Method name* - You can specify any name for the method as long as it is a valid C# name

*()* - in side the parentheses we  specify the parameter the method receive  
The Run() used in the HelloWorld receives no parameters so nothing is specify inside the parentheses  


###### Calling a Method

To call a method we will specify the Method “Address” name space and the method name:
```csdiff 
System.Windows.Forms.MessageBox.Show("Hello World");
```

System.Windows.Forms – is the namespace
MessageBox – is the class name
Show – is the method name
which receives text as parameters


###### Calling the Method from the menu

When we DbClick on the menu item Visual Studio generated a method which is called every time the menu item is being clicked
inside this method we added the code to call the Run method of the HelloWorld class.

```csdiff 
new Training.HelloWorld().Run();
```
 
*new* – a keyword to create a new instance of a class
in this case we create a new instance of HelloWorld class which defined under the Training folder.
and then we called the Run() method.




