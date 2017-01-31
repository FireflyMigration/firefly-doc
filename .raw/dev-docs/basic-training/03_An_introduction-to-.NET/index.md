# An Introduction to .NET

## .NET Framework Overview

What is .NET?
1.	A comprehensive development environment for IT and Web applications.
2.	C# is the premier language of the .NET platform, specifically designed to take advantage of the .NET framework. It’s simple, and easy to learn.
3.	The .NET framework class library is a broad collection of reusable functionality that simplifies development and enables you to accomplish a range of common programming tasks, such as, string manipulations, data collection, database connectivity, and file access.
4.	.NET Framework is free (SDK and Runtime).

## Visual Studio and C# Overview

### Program Structure – Hello World

1.	Open the migrated application.
2.	Review the different parts of Visual Studio:
	a. **Solution Explorer**, Show the ENV project and the reference to Firefly.Box.dll
	b. Review **Models** and **Types** in the Base project and all the programs and their Views in the rest of the projects. Keep it simple and notice that it will be covered in detail later.
	c. Show the different projects that compound the migrated application.
3.	Open the **ApplicationMdi** in designer (it is in the main project, in the Views folder)
	a. Add a new dropdown menu named “Training”.
	b. Add a new entry to the Training menu named “Hello World” and double click it to create a handler for its click event.
	c. Write the following code (without using the mbox snippet):
```csdiff
private void helloWorldToolStripMenuItem_Click (object sender, System.EventArgs e)
{
	System.Windows.Forms.MessageBox.Show("Hello World");
}
```

3. d. **Note**:  When presenting code in Visual Studio:
		i. Code is Case Sensitive
		ii. You can press **ALT+SHIFT+ENTER** to switch to **full screen** view.
		iii. You can change the **zoom** by **scrolling** with **CTRL** key pressed.
	e.	Notice the following:
		i. Each line should end with a semicolon “;”
		ii. Intellisense: Notice that there are two options to work with this feature.
![intellisence](intellisence.png)
		 iii. Namespaces, classes and methods on a basic level – Review the first 3 slides in the Power Point Presentation.

4.	System.Windows.Forms part is a namespace (help to organize the code).
5.	MessageBox is a class
6.	Show is a method
	a. Add the following comments above the code line, using single line (//) and multi-line (/*…*/):
```csdiff 
	/* The following line displays
 *  a message box
 *  to the User */
 ```
b. Run the application using the “Start” button  ![start button](start_button.png)


### Method Overloading

Overloading allows Methods to have the same name but with different parameters.
![Method Overloading](Method_Overloading.png)
 
Method can have several options based on the number or type of parameters it receives. – Check the 2rd option (string text, string caption)
Similar to Magic Verify option that has several options.
**CTRL-SHIFT-SPACE** between the parentheses will display the available variation of the  Show method and the required parameter info. (Displayed in Bold)

### Using Directives

1.	Add the following line to the beginning of the file:
`using System.Windows.Forms;`
2.	Write the following code in the same method after the last message:
```csdiff
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
```csdiff
private void helloWorldToolStripMenuItem_Click (object sender, System.EventArgs e)
{
	System.Windows.Forms.MessageBox.Show("Hello World");
     MessageBox.Show("Using directives make the code shorter");
+    MessageBox.Show("Code snippets allow me to type less");
}
```
3.	 The full list of C# Snippets can be found in here:

http://msdn.microsoft.com/en-us/library/z41h7fat.aspx

4.	Exercise: Program Structure

## Solution Overview

Open the migrated application in Visual Studio and review the following:
1. The solution explorer.
2. The ENV project – has the common functionality which is used by the rest of the application such as:
	a. Functions. (DSTR, VAL,STRTOKEN)
	b. INI and Settings
	c. Users and Rights management
	d. Database Connection management
	e. Logical names
3. Your tables are located in the Northwind project under a folder called **Models**.
4. Review only in the Solution explorer without opening the code.
5. Run the application and open the **Entities** (SHIFT+F2) and “**Controllers** (SHIFT+F3) screens. Notice that these screens are not available to the end users.
6. In the **“Entities** screen, press Enter on one of the entities. Notice that the data can be edited directly. Check the grid **enhanced features**, by pressing on the column header menu and select “Custom Filter”.
7. In **Controllers** screen, press Enter on one of the programs. Notice that it can be executed directly (like F7 in Magic).
8. The start project (In Bold) has the menus – **Application MDI**.

## Simple Data Types
1. Under the "Training" menu, add a new entry named “Basic Data Types”.
2. Define the following variables as shown below.
3. Notice the naming conventions standard – first letter of a variable is a lowercase and the first letter of every word afterwards is an uppercase. (Called CamelCase)
4. The main types are - int, string, double, char and bool. Let's use them in a message as shown below.
5. Note that until used, a variable is underlined to show that it seems unnecessary.
6. Run the application and check the method.
```csdiff
private void basicDataTypeToolStripMenuItem_Click(object sender, EventArgs e)
{
	string name = "Virginie";
	int numberOfCars = 2;
	char gender = 'F';
	double height = 1.55;
	bool isStudent = false;

	MessageBox.Show("Hello "  + name );
	MessageBox.Show("Gender " + gender );
	MessageBox.Show("Number of Cras " +numberOfCars.ToString());
	MessageBox.Show("Height = " + height.ToString());
	MessageBox.Show("Is a Student " + isStudent.ToString());
}
```

### About Strings and Characters

#### String VS. Char

1.	A char is a single character as opposed to a string which is comprised of many characters. 
2.	A string is surrounded with double quotes for example: "firefly".
3.	A char is surrounded with single quotes, for example: 'x'.

####	Strings
1.	`+` concatenates two strings. For example: `"Hello " + name`
2.	Other types can be turned into a string, by calling the ToString() method directly afterwards.
```csdiff
MessageBox.Show("Your height is "+ height.ToString());
```

#### Escape sequences and @-quoting

1.	Special Characters: Use a Backslash to include special characters in a string.
2.	This is useful for defining pathnames.
3.	Add a MessageBox with: David says: "Hello".
```csdiff
MessageBox.Show("David says \"hello\"");
```
4.	Another common example is using the '\' in a string such as file name:
```csdiff
MessageBox.Show("The system folder is - c:\\windows\\ ");
```
Or Alternatively:
```csdiff
MessageBox.Show(@"The system folder is - c:\windows\ ");
```
5.	Below is an example how to display each string in a new line using the character \n. Note that the rest of the options are in the student's workbook under _String and Chars_.
```csdiff
private void basicDataTypeToolStripMenuItem_Click(object sender, EventArgs e)
{
	string name = "Virginie";
	int numberOfCars = 2;
	char gender = 'F';
	double height = 1.55;
	bool isStudent = false;

-    MessageBox.Show("Hello "  + name );
-    MessageBox.Show("Gender " + gender );
-    MessageBox.Show("Number of Cras " +numberOfCars.ToString());
-    MessageBox.Show("Height = " + height.ToString());
-    MessageBox.Show("Is a Student " + isStudent.ToString());

+    MessageBox.Show("Hello " + name + "\n"+ 
+                    "Gender = " +gender + "\n"+
+                    "Number of Cars " + numberOfCars.ToString() + "\n"+
+                    "Height "+height.ToString());
}
```
6.	Exercise: Data Types