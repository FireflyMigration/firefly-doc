
The Using statements are added to improve the code readability.

Adding the namespace as a using statement saves the developer from writing the namespace in the code before each method.

For example:

Instead of typing:
```csdiff
System.Windows.Forms.MessageBox.Show("Test");
```

We can add 
```csdiff
using System.Windows.Forms;
```
 at the top of the file
and then just to type: 
```csdiff
MessageBox.Show("Text to be Displayed");
```


```csdiff
+using System.Windows.Forms;
namespace Northwind.Training
{
    class HelloWorld
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


<iframe width="560" height="315" src="https://www.youtube.com/embed/DuvZV5omiqY?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
