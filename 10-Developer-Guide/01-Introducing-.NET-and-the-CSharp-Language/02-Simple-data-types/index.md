**Simple Data Types**


Data types are  used to define fields , variables.  
In C# there are various data types, but let's start with the basic ones:  
int, string, double, char and bool  

When defining a variable we first need to set its type and then its name
For example: string CompanyName;  
string – is the type of the variable  
CompanyName is the variable’s name.  

Notice the standard naming conventions: the name of the variable starts with lower case and the first letter of every word afterwards is an uppercase.  
You can read more about the Capitalization styles and recommendations at [Capitalization Styles](https://msdn.microsoft.com/en-us/library/x2dbyw72(v=vs.71).aspx).  

We can also initialize the variable in the same line by using the equation sign: 

```csdiff
string companyName = "my name";
```


**Let's create data types and display their values in the message box:**

1. Right click on the *Training* folder and select **Add/New Item**  
2. Choose Class and name it 'BasicTypes.cs'  
3. In the code below 5 different data types are defined and initialized  
    - string, int, bool, double and char are the data types   
    - personName, numberOfKids, isStudent, height & gender are the variables names  
    - personName is initialized when it is defined  
    - The numberOfKids received its value in the next assignment line of code `numberOfKids = 3`

```csdiff
namespace Northwind.Training
{
    class BasicTypes
    {
       public void Run()
       {
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


4. Note:  
    A variable which is not in used is marked with a green underline  

5. **String VS Char**  
  A char is a single character as opposed to a string which is comprised of many characters.  
  String is surrounded by double quotes while char is surrounded by a single quote.  
   
6. In order to use the System.Windows.Form.MessageBox class we will add it to the using section 
   and we will use the MessageBox.Show() method to display them

```csdiff
+using System.Windows.Forms;
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
       }     
    }
}

```

7. When used on strings the **+ operator** concatenates the two string into a single string.  
8. The **ToString()** method is used to convert the value to string.  
    Every object in .net has `ToString()` method that convert itself to string.  

9. When concatenating string with number you do not have to use the ToString() method this will be done automatically by C#.
 
10. To call this class from the menu we will add a new entry in the ApplicationMDI menu  
   DblClick on the menu so Visual Studio will generate the code that will be executed when clicking the menu entry
   and call this class by calling its Run() method



```csdiff
private void basicTypesToolStripMenuItem_Click(object sender, EventArgs e)
{
+	new Training.BasicTypes().Run();
}
```
11. before running the application remember to build it.  

--- 

<iframe width="560" height="315" src="https://www.youtube.com/embed/eel6sOTM1hY?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>




    
