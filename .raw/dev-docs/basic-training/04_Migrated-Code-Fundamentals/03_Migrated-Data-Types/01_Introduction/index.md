### Introduction
1.	In Magic we are used to create columns in our data view (Select real or Select virtual). However, we have also used even simpler types of values when we have used expressions. For example, an expression such as “1+1” returns the number 2. That number is not a column, but a simple numeric value. The same is with other kinds of expressions that return a text value, date value, time value or a boolean value, all of which are different from the columns in the data view.
2.	The migrated code is based on 5 basic data types that are the smallest building blocks of the migrated application. These types support the functionality of the original application:

| Type   | Similar to                               | Comments                                                                                                      |
|--------|------------------------------------------|---------------------------------------------------------------------------------------------------------------|
| **Number** | int, float, decimal, byte, short, double | One to handle them all., When divided by zero – returns Zero                                                  |
| **Text**   | String                                   | When performs comparison – it ignores spaces at the end of the string. String- "A " <> "A" Text – "A " == "A" |
| **Bool**   | Bool                                     | Also supports null.                                                                                           |
| **Date**   | DateTime                                 | Only has the date part (no time), Can be null, Can be Empty.                                                  |
| **Time**   | Timespan                                 | Accurate to seconds., Can be null, Can be Empty                                                               |

a.	*Number* – Used for any kind of numeric value. Can be divided by zero and return zero (just like in magic).
```c#
//Number

int x=1; 
int y=0;
int z = x/y;    // RunTime Error

Number n=1;
Number k=0;
Number m=n/k;   // equal to zero
```

b.	Text – similar to string, but different in the way that two text values are compared (it trims the end of the values before comparing). 
```c#
//Text
string s1 = "a";
string s2 = "a ";
var result = s1 == s2; //False

Text t1= "a";
Text t2= "a ";
var result = t1 == t2; //True

```
c.	Date – Can be null or Date.Empty.
d.	Time – There is no .NET equivalent
e.	Bool – Can be True, False or null, unlike the C# bool type, which does not support null value. 
```c#
// Bool
bool b = null; //Compile Error
Bool B = null; // Valid
```
3.	Add a new menu entry in Application.MDI "Migrated Data Types" and double click it to create a handler for its click event.
4.	Create the following Data Types and display the message.
```c#
private void migratedDataTypesToolStripMenuItem_Click(object sender, EventArgs e)
{
    Text name = "David";
    Number price = 4.5;
    Number quantity = 5;
    Number total = price * quantity;
    Date currentDate = Date.Now;
    Time currentTime = Time.Now;
    Bool memberShip = true;

    System.Windows.Forms.MessageBox.Show("Invoice For: " + name + "\n" +
                                         "Date: " + currentDate.ToString() + "\n" +
                                         "Time: " + currentTime.ToString() + "\n" +
                                         "Total purchase: " + total.ToString() + "\n" +
                                         "MemberShip: " + memberShip.ToString()
                                        );

}
```
5.	Build and run from the menu
6.	Exercise: Migrated Data Types
