
### Snippets 

1. Snippet is actually a shortcut to write specific code. 
2. To use snippet we should type the shortcut and press the Tab key twice

**Sinppet for MessageBox.Show():**

Inside the Run() method type 'mbox' and press Tab twice
Automatically the full call to the method is inserter to the code and the parameter is "Test" is marked.
You can change the text or press the Enter key to accept it.
 

![Snippet](Snippet.png)
```diff
using System.Windows.Forms;
namespace Northwind.Training
{
    Class HelloWorld
    {
       public void Run()
       {
          MessageBox.Show("Hello World", "Hello World Caption", MessageBoxButton.OK);
+         MessageBox.Show("the message");
+         MessageBox.Show("Test");


       }     
    }
}
```

The full list of C# Snippets can be found in here:

http://msdn.microsoft.com/en-us/library/z41h7fat.aspx

<iframe width="560" height="315" src="https://www.youtube.com/embed/efWaPPyea2U" frameborder="0" allowfullscreen></iframe>
