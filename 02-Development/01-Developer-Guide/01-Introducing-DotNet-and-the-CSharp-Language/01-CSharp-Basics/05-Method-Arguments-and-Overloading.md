**Method Arguments and Overloading**  

Methods can receive arguments.  
The arguments are sent between parentheses.

To see the arguments the method receives you can:
1. Type open parentheses  
2. Click the method parameter button on the toolbox when the cursor is between the parentheses:  
   ![Show Arguments](Show-Arguments.png)  
3. Press <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>Space</kbd> when the cursor is between the parentheses.

  
**Overloading**   
The overloading mechanism allows methods to have the same name but with different combinations of parameters.  
A method can have several definitions using different number or type of parameters.
Based on the parameters sent the matching method will be called.  


 
For example the Show() method of System.Window.Forms.MessageBox class can receive the text to be displayed on the message box as parameter.  

It can also receive the Text and the caption.  

The Show() method has 21 overloads, meaning it has 21 variant of the method that receive different combinations of parameters.  

![Method Overloading](Method_Overloading.png)


```csdiff
namespace Northwind.Training
{
    class HelloWorld
    {
       public void Run()
       {
-           System.Windows.Forms.MessageBox.Show("Hello World");
+           System.Windows.Forms.MessageBox.Show("Hello World", "Hello World Caption", System.Windows.Forms.MessageBoxButton.OK);
       }     
    }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/Z97ayKhfYtE?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

