### Using Directives

The Using statements are added to improve the code readability.

Adding the namespace as a using statement saves the developer from writing the namespace in the code before each method.

For example:

Instead of typing - 
System.Windows.Forms.MessageBox.Show("Test");

We can add 
using System.Windows.Forms; at the top of the file
and then just to type: MessageBox.Show("Text to be Displayed");


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
2.	Remove the System.Windows.Forms from line which calls the Show() method :
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
