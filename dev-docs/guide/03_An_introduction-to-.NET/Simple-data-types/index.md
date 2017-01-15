## Simple Data Types

1. So in this folder *Training*, click right again **Add/New Item**, choose Class application template by choosing in the left pane Installed, Visual C# Items, and then choosing Class in the middle pane. Name the class BasicTypes.cs at the bottom of the Name dialog.
2. Define the following variables as shown below 
```diff
namespace Northwind.Training
{
    Class BasicTypes
    {
+       public void Run()
+       {
+           string personName ="Noam";
+           int numberOfKids;             
+           numberOfKids = 3;

+           bool isStudent = false;
+           double height =1.77;

+           char gender ='M';
+       }     
    }
}
```

In this code we define the type `String`, the name `personName` and the value init `Noam`...

3. Notice the naming conventions standard – first letter of a variable is a lowercase and the first letter of every word afterwards is an uppercase. (Called CamelCase)
4. The main types are - int, string, double, char and bool. Let's use them in a message as shown below.
5. Note that until used, a variable is underlined to show that it seems unnecessary.
6. Now we put the variables on the messagebox
```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    Class BasicTypes
    {
       public void Run()
       {
           string personName ="Noam";
           int numberOfKids;             
           numberOfKids = 3;

           bool isStudent = false;
           double height =1.77;

           char gender ='M';

+         	MessageBox.Show("Hello "  + personName ); 
+         	MessageBox.Show("You have "  + numberOfKids.ToString() + " children" ); 
       }     
    }
}
```

The + operator when it uses on the string concatenate the two string into a single string.
Every object in .net will have `ToString()` method that's transfer anything into a string

7. add a new entry named “Basic Types” in the applicationMdi.
8. Run the application and check the method.
```csharp
private void basicTypesToolStripMenuItem_Click(object sender, EventArgs e)
{
	new Training.BasicTypes().Run();
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/eel6sOTM1hY" frameborder="0" allowfullscreen></iframe>
### About Strings and Characters

#### String VS. Char

1.	A char is a single character as opposed to a string which is comprised of many characters. 
2.	A string is surrounded with double quotes for example: "firefly".
3.	A char is surrounded with single quotes, for example: 'x'.

####	Strings
1.	`+` concatenates two strings. For example: `"Hello " + name`
2.	Other types can be turned into a string, by calling the ToString() method directly afterwards.
```csharp
MessageBox.Show("Your height is "+ height.ToString());
```

#### Escape sequences and @-quoting

1.	Special Characters: Use a Backslash to include special characters in a string.
2.	This is useful for defining pathnames.
3.	Add a MessageBox with: David says: "Hello".
```csharp
MessageBox.Show("David says \"hello\"");
```
4.	Another common example is using the '\' in a string such as file name:
```csharp
MessageBox.Show("The system folder is - c:\\windows\\ ");
```
Or Alternatively:
```csharp
MessageBox.Show(@"The system folder is - c:\windows\ ");
```
5.	Below is an example how to display each string in a new line using the character \n. Note that the rest of the options are in the student's workbook under _String and Chars_.
```diff
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