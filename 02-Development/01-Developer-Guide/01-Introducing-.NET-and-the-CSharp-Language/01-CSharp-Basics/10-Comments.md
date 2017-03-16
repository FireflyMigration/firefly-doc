
**Comments**

Comments can be used to document lines in the code or to add remarks for the developers    

To add a single line comment use **//** before the comment

To Add Multi line comment add **/\*** before the comment and **\*/** at the end


```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
    class HelloWorld
    {
       public void Run()
       {
          MessageBox.Show("Hello World", "Hello World Caption", MessageBoxButton.OK);
          /* this 
          is 
          a 
          multi line 
          comment          
          */  
          MessageBox.Show("the message");;
          // one line comment
          MessageBox.Show("Test");
       }     
    }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/OdKoPet16bA?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>



Exercise: [Hello C#](09-Hello-csharp-exercise.md)
