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
5. The clas is ready to use, let's call it from the menu
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
7. Run by pressing the Start button and call the program from the menu


<iframe width="560" height="315" src="https://www.youtube.com/embed/CNElgYn_zgA" frameborder="0" allowfullscreen></iframe>


## Explaining The Hello world example
1. C# is case sensitive (with upper or lower case)
2. Every execution statement ends with a `;`
3. The code is organized in classes
4. Classes have members (Methods, fields, properties, events etc…)
5. Classes are organized in namespaces (like folders)

Review the actual code:
1. Namespace definition : `Northwind.Training` 
2. Class definition : `Class HelloWorld`
3. Method definition `Run`  
4. Now, in C#, there's a concept calls scopes and scopes are define by curly brackets.
* Members can only be added to class
* Logic can only be added to method

5. Explain the method structure
6. public is an access modifier - Access modifiers are keywords used  to specify the declared accessibility of a member or a type. It determines which code an use this class or method. There are Four access modifiers :
  * `private` – only visible to code within this class and it's inner classes
  * `protected` – also visible to code within class that inherit from this class.
  * `internal` – visible to any code within my assembly (dll/exe)
  * `public` – visible to any code.
By default, classes are `internal` and members are `private`

 
7. Methods can return a value to the caller, for this example the return type is `void`
8. it names `Run`
9. Method parameters are enclosed in parentheses and are separated by commas
10. code

Calling the message box:
1. Namespace : `System.Windows.Forms`
2. Class : `MessageBox`
3. Method : `Show`
4. Arguments.

Go back to the menu and double click on the *Hello World* Menu

1. We are creating an new instance of the Hello World class and then we are calling it with the `Run()` method.
2. highlight the difference between the call on the UI using new and the call in our code not using new.
3. This is because the show method is static - we will talk about it more later in the code.
4. `System.Windows.Forms` part is a namespace (help to organize the code).
5. `MessageBox` is a class
6. `Show` is a method
7. Run the application using the “Start” button  ![start button](start_button.png)

<iframe width="560" height="315" src="https://www.youtube.com/embed/X_8GeOvDMaM" frameborder="0" allowfullscreen></iframe>


### Method Arguments and Overloading
Method arguments are sent between curly brackets.
To see the arguments, type open parenthesis - or click the method parameter button on the toolbox when the cursor is between the parenthesis:

![Show Arguments](../Visual-Studio-Configuration/Show-Arguments.png)

Or press **CTRL-SHIFT-SPACE** between the parentheses.


Overloading allows Methods to have the same name but with different parameters.
![Method Overloading](Method_Overloading.png)
 
Method can have several options based on the number or type of parameters it receives. – Check the 2rd option (string text, string caption)
Similar to Magic Verify option that has several options.
Will display the available variation of the Show method and the required parameter info. (Displayed in Bold), we can add caption and button 

```diff
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
-           System.Windows.Forms.MessageBox.Show("Hello World");
+           System.Windows.Forms.MessageBox.Show("Hello World", "Hello World Caption", System.Windows.Forms.MessageBoxButton.OK);
       }     
    }
}


 <iframe width="560" height="315" src="https://www.youtube.com/embed/Z97ayKhfYtE" frameborder="0" allowfullscreen></iframe>

### Using Directives

Using statements are added to improve on code readability, by adding a namespace in a using statement we don't have to write that namespace again in our code.

1.	Add the following line to the beginning of the file:
```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
           System.Windows.Forms.MessageBox.Show("Hello World", "Hello World Caption", System.Windows.Forms.MessageBoxButton.OK);
       }     
    }
}
```
2.	So now we can remove using System.Windows.Forms from the code like :
```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
-           System.Windows.Forms.MessageBox.Show("Hello World", "Hello World Caption", System.Windows.Forms.MessageBoxButton.OK);
+           MessageBox.Show("Hello World", "Hello World Caption", MessageBoxButton.OK);
       }     
    }
}
```
3.	Note: The “using” keyword has more usages and meanings that will be covered later.

<iframe width="560" height="315" src="https://www.youtube.com/embed/DuvZV5omiqY" frameborder="0" allowfullscreen></iframe>

### Snippets 
1.	Use a snippet to shorten this even more.
2.	Write the following code, using the “mbox” snippet (write mbox and press Tab twice):
 
![Snippet](Snippet.png)
```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
          MessageBox.Show("Hello World", "Hello World Caption", MessageBoxButton.OK);
+         MessageBox.Show("the message");
+         MessageBox.Show("Test");


       }     
    }
}
```
3.	 The full list of C# Snippets can be found in here:

http://msdn.microsoft.com/en-us/library/z41h7fat.aspx

<iframe width="560" height="315" src="https://www.youtube.com/embed/efWaPPyea2U" frameborder="0" allowfullscreen></iframe>

## Comments
	a. Add the following comments above the code line, using single line (//) and multi-line (/*…*/):
```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
          MessageBox.Show("Hello World", "Hello World Caption", MessageBoxButton.OK);
          /* this 
          is 
          a 
          multi line 
          comment          
          */  
          MessageBox.Show("the message");;
          // one line comment
          MessageBox.Show("Test");
       }     
    }
}
```

 <iframe width="560" height="315" src="https://www.youtube.com/embed/OdKoPet16bA" frameborder="0" allowfullscreen></iframe>


4.	Exercise: Program Structure

