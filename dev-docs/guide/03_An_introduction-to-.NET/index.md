# An Introduction to .NET

## .NET Framework Overview

What is .NET?
1.	.Net is a comprehensive **development environment** for IT and Web applications.
2.	C# is the premier **language** of the .NET platform, specifically designed to take advantage of the .NET framework. It’s simple, and easy to learn.
3.	The .NET framework class library is a broad collection of reusable functionality that simplifies development and enables you to accomplish a range of common programming tasks, such as, string manipulations, data collection, database connectivity, and file access.
4.	.NET Framework is free (SDK and Runtime).

## Visual Studio and C# Overview

### Solution Structure 

1.  Before open the solution in the solution explorer, make sure to run `BuildDebug.bat` to build the project and make sure that everything is ready.
2.	Visual Studio is compound from three basic parts :
	a. **Solution Explorer**, provides you with an organized view of your projects and their files
    b. **Working area**, edits your code
    c. **Tool box**, displays icons for controls and other items that you can add to Visual Studio projects
4. In the solution explorer, 
    a. *ENV* project that represent all the sources code generated
    b. *Northwind* solution 
    c. *Northwind.[moduleName]* that compound the migrated application.
    d. *NorthwindBase*, contains the migrated tables under the Models folder, migrated Models under the Types folder and other objects which are shared by the whole solution.

5. In Northwind's project we have several parts:
     a. .ini file, this configuration file use to run the application
     b. the Views folder, contains all the menus
     c. ApplicationCore class, is migrated version of the main program
     d. ApplicationPograms class, is the list of the migrated programs with their numbers, names, public names, and their location inside the solution
     e. ApplicationEntities class, is the list of the migrated tables with their numbers, names, public names, and their location inside the solution
     f. program.cs, is the first program that runs when you launch the application
     

<iframe width="560" height="315" src="https://www.youtube.com/embed/cqMe4SoLVzY" frameborder="0" allowfullscreen></iframe>



## Create a simple class (program) : Hello World

In this section we will create a new class that displays text in a message box

How to Do:
1. Go to the northwind project, click right **Add/New Folder** and call it *Training*.
2. On this folder, right click again **Add/New Item**, 
   In the left panel choose  Visual C# Items, 
   From the Middle panel choose Class for example, 
   Name the class HelloWorld.cs at the bottom 
   Click the Add button
3. The Using section at the top of your code is not necessary. you can remove it.
4. Write the below code inside the HellowWorld class as shown below
   
```diff
namespace Northwind.Training
{
    Class HelloWorld
    {
+       public void Run()
+       {
+           System.Windows.Forms.MessageBox.Show("Hello World");
+       }     
    }
}
```
5. The class is ready to use, let's call it from the menu
    5.1  Go to Views Folder and go to ApplicationMdi.cs and double click on it
    5.2  Click on an empty area on the menu bar, type *Training* and under Training type a sub-menu *Hello World*
    5.3  Double click on it and here we will right the code to call the new class as follows
```diff
private void helloWorldToolStripMenuItem_Click (object sender, System.EventArgs e)
{
+   new Training.HelloWorld().Run();	
}
```
6. Build - Build menu / Build solution
7. Run by pressing the Start button and call the program from the menu ![start button](start_button.png)


<iframe width="560" height="315" src="https://www.youtube.com/embed/CNElgYn_zgA" frameborder="0" allowfullscreen></iframe>


## Explaining The Hello world example


Review the actual code:

The code is organized by Namespace, Class and Method
Code that is actually executed can only be defined inside a Methods.

In the HelloWorld sample we created a new class and we defined a method inside this class
The Run method is part of the HelloWorld class
The Namespace of the HelloWorld class is Northwind.Training

**Namespaces**
Namespaces are used to organize the classes.
They used as the address of the class inside the solution.
The class HelloWorld is saved at Training folder under the Northwind solution.

**Classes** 
With C#, code can be written only inside classes.
Class can contains Members such – Methods, properties, fields and more
The class HelloWorld contains a Method called Run()
Inside the Method we called another method called Show() 
and we sent the text to be displayed as parameter to the method.

**Method**
Method contains to code that is executed once the method is called.
The Run() method executes one line of code – it calls the Show() method 

**The method header definition:**

*Access modifier* - 
Access modifier is a keyword used  to specify the accessibility level of the method (or a class)
It defined which code can see or use the method (or class)
There are Four access modifiers :
 * private –  visible to members within this class and inner classes
 * protected – visible to members within this class and those which are inherits from this class 
 * internal – visible to any code within my assembly (dll/exe)
 * public – visible to any code.
The Run() used in the HelloWorld has public access modifier.


*Return value* - 
Method can return a value to the caller
The return value type should be define in the Method header before the Method name
void is specify when a method doesn’t return a value
The Run() used in the HelloWorld has no return value so we specify void.

*Method name*
You can specify any name for the method as long as it is a valid C# name

*()*
in side the parentheses we  specify the parameter the method receive
The Run() used in the HelloWorld receives no parameters so nothing is specify inside the parentheses


**Calling a Method**

To call a method we will specify the Method “Address” name space and the method name:
System.Windows.Forms.MessageBox.Show("Hello World");

System.Windows.Forms – is the namespace
MessageBox – is the class name
Show – is the method name
which receives text as parameters


**Calling the Method from the menu**

When we DbClick on the menu item Visual Studio generated a method which is called every time the menu item is being clicked
inside this method we added the code to call the Run method of the HelloWorld class.

new Training.HelloWorld().Run();
 
*new* – a keyword to create a new instance of a class
in this case we create a new instance of HelloWorld class which defined under the Training folder.
and then we called the Run() method.




<iframe width="560" height="315" src="https://www.youtube.com/embed/X_8GeOvDMaM" frameborder="0" allowfullscreen></iframe>



