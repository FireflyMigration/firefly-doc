# Simple Data Types

Data types are variable that are based on value type.
    Notice the naming conventions standard – first letter of a variable is a lowercase and the first letter of every word afterwards is an uppercase.
    The main types are - int, string, double, char and bool. Let's use them in a message as shown below.
    Note that until used, a variable is underlined to show that it seems unnecessary.


How to do :
1. So in this folder *Training*, click right again **Add/New Item**, choose Class and name it 'BasicTypes.cs'
2. We create data types and put them in the message box as shown below
```diff
namespace Northwind.Training
{
    class BasicTypes
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

For this example `string` is a type, `personName` is the name of the variable and `Noam` is the value init 
3. Now we want the variables appears in the message box
```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    class BasicTypes
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
Every object in .net will have `ToString()` method that's transfer anything into a string.

4. Add a new entry in the menu named “Basic Types” in the applicationMdi.

```csharp
private void basicTypesToolStripMenuItem_Click(object sender, EventArgs e)
{
	new Training.BasicTypes().Run();
}
```
5.Build the application and Run 

<iframe width="560" height="315" src="https://www.youtube.com/embed/eel6sOTM1hY" frameborder="0" allowfullscreen></iframe>


# More on Strings

In this section we will see how wrote different strings type

How to do :

1. So in this folder *Training*, click right again **Add/New Item**, choose Class and name it 'MoreOnStrings.cs'.
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

```diff
private void moreOnStringsToolStripMenuItem_Click(object sender, EventArgs e)
{
+	new Training.MoreOnStrings().Run();
}
```
4. We create a message with a simple string :
```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    class MoreOnStrings
    {
+        MessageBox.Show("I'm a simple string");
    }
}
```
5. But sometime you can use special character in your string. For example the quote characters. So the way that your special character in the string is to use back slash sign 
```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    class MoreOnStrings
    {
        MessageBox.Show("I'm a simple string");
+       MessageBox.Show("I'm a quote\"");
+       MessageBox.Show("Line one\r\nLine Two");
    }
}
```

6.	An other common example is using the '\' in a string such as file name:

```MessageBox.Show("Windows Path: c:\\windows");```

Or Alternatively:

```MessageBox.Show(@"Windows Path: c:\windows using the @ sign to use quites just say ""double quotes"" ");```

7. You can use `@` for multi line text too:
```csharp
MessageBox.Show(@"I'm a multi 
line 
text 
in many 
line");
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/o1xAgJTEO8k?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

8.	Exercise: Data Types
    