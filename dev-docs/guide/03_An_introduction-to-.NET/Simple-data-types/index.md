# Simple Data Types

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
       }     
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
+      }     
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

## More on Strings

1. So in this folder *Training*, click right again **Add/New Item**, choose Class application template by choosing in the left pane Installed, Visual C# Items, and then choosing Class in the middle pane. Name the class MoreOnStrings.cs at the bottom of the Name dialog.
2. Define the following variables as shown below 
```csharp
namespace Northwind.Training
{
    Class MoreOnStrings
    {
    }
}
```

3. add a new entry named “More On Strings” in the applicationMdi.

```csharp
private void moreOnStringsToolStripMenuItem_Click(object sender, EventArgs e)
{
	new Training.MoreOnStrings().Run();
}
```
4. We create an message with a simple string :
```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    Class MoreOnStrings
    {
+        MessageBox.Show("I'm a simple string");
    }
}
```
5. But sometime you use special character in your string. For example the quote characters. So the way your special character in the string is to use back slash sign 
```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    Class MoreOnStrings
    {
        MessageBox.Show("I'm a simple string");
+       MessageBox.Show("I'm a quote\"");
+       MessageBox.Show("Line one\r\nLine Two");
    }
}
```

6.	An other common example is using the '\' in a string such as file name:
```csharp
MessageBox.Show("Windows Path: c:\\windows");
```
Or Alternatively:
```csharp
MessageBox.Show(@"Windows Path: c:\windows using the @ sign to use quites just say ""double quotes"" ");
```

7. You can use `@` for multi line text too:
```csharp
MessageBox.Show(@"I'm a multi 
line 
text 
in many 
line");
```
8.	Exercise: Data Types
    