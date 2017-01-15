# An Introduction to .NET

## .NET Framework Overview

What is .NET?
1.	A comprehensive development environment for IT and Web applications.
2.	C# is the premier language of the .NET platform, specifically designed to take advantage of the .NET framework. It’s simple, and easy to learn.
3.	The .NET framework class library is a broad collection of reusable functionality that simplifies development and enables you to accomplish a range of common programming tasks, such as, string manipulations, data collection, database connectivity, and file access.
4.	.NET Framework is free (SDK and Runtime).

## Visual Studio and C# Overview

### Program Structure 

1.	Open the migrated application.
2.	Review the different parts of Visual Studio:
	a. **Solution Explorer**, Show the ENV project and the reference to Firefly.Box.dll
	b. Review **Models** and **Types** in the Base project and all the programs and their Views in the rest of the projects. Keep it simple and notice that it will be covered in detail later.
	c. Show the different projects that compound the migrated application.
    4. **Virginie - please add some more information here based on my video - regarding the different components of an application**

## Hello World

### Virginie - please change to match the way I did it in the video ##

## review hello world example
1. C# is case sensitive
1. Every execution statement ends with a ;
1. The code is organized in classes
1. Classes have members (Methods, fields, properties, events etc…)
1. Classes are organized in namespaces (like folders)

Review the actual code:
1. namespace definition
2. class definition
3. method definition
4. Curly brakets to control scope.
* Members can only be added to class
* Logic can only be added to method

5. Explain the method structure
6. public is an access modifier - show pp.
7. return type
8. name
9. parameters
10. code.

Calling the message box:
1. namespace
2. class
3. method.
4. Arguments.

Go back to the menu
1. review the way we called our code
2. Explain that we are creating an instance of the Hello World class and then we are calling it.
2. highlight the difference between the call on the ui using new and the call in our code not using new.
3. This is because the show method is static - we'll talk about it more later in the code.
4.	System.Windows.Forms part is a namespace (help to organize the code).
5.	MessageBox is a class
6.	Show is a method
b. Run the application using the “Start” button  ![start button](start_button.png)


### Method Arguments and Overloading
Method arguments are sent between curly brackets.
To see the arguments, type open parenthesis - or click the method parameter button on the toolbox when the cursor is between the parenthesis:

![Show Arguments](../Visual-Studio-Configuration/Show-Arguments.png)

Or press **CTRL-SHIFT-SPACE** between the parentheses.



Overloading allows Methods to have the same name but with different parameters.
![Method Overloading](Method_Overloading.png)
 
Method can have several options based on the number or type of parameters it receives. – Check the 2rd option (string text, string caption)
Similar to Magic Verify option that has several options.
 will display the available variation of the  Show method and the required parameter info. (Displayed in Bold)

### Using Directives

1.	Add the following line to the beginning of the file:
`using System.Windows.Forms;`
2.	Write the following code in the same method after the last message:
```diff
private void helloWorldToolStripMenuItem_Click (object sender, System.EventArgs e)
{
	System.Windows.Forms.MessageBox.Show("Hello World");
+    MessageBox.Show("Using directives make the code shorter");
}
```
3.	Notice that with using you can just write `MessageBox.Show`
4.	Note: The “using” keyword has more usages and meanings that will be covered later.

### Snippets 
1.	Use a snippet to shorten this even more.
2.	Write the following code, using the “mbox” snippet (write mbox and press Tab twice):
![Snippet](Snippet.png)
```diff
private void helloWorldToolStripMenuItem_Click (object sender, System.EventArgs e)
{
	System.Windows.Forms.MessageBox.Show("Hello World");
     MessageBox.Show("Using directives make the code shorter");
+    MessageBox.Show("Code snippets allow me to type less");
}
```
3.	 The full list of C# Snippets can be found in here:

http://msdn.microsoft.com/en-us/library/z41h7fat.aspx

## Comments
	a. Add the following comments above the code line, using single line (//) and multi-line (/*…*/):
```csharp 
	/* The following line displays
 *  a message box
 *  to the User */
 ```

4.	Exercise: Program Structure





