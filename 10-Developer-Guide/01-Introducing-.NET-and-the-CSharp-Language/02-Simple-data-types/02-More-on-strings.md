# More on Strings

**Special characters in string**

Special characters are not displayed as is.  
To display special characters in string add back slash sign before the characters  
For example:

- To display the quote sign in a message box use \" before the quote
- To display a message with 2 lines use \r\n 



```csdiff
using System.Windows.Forms;
namespace Northwind.Training
{
    class MoreOnStrings
    {
        public void Run()
        {
            MessageBox.Show("I'm a simple string");
+           MessageBox.Show("I'm a quote\"");
+           MessageBox.Show("Line one\r\nLine Two");
        }
     }
}
```



To display the backslash character double it: instead of `\` use `\\`  
```csdiff
MessageBox.Show("Windows Path: c:\\windows");
```

Or Alternatively: to display a string as is use the @ sign before the string


```csdiff
MessageBox.Show(@"Windows Path: c:\windows using the @ sign to use quites just say ""double quotes"" ");
```

The @ sign can be used also to display multi line text without the need to use \n in the string:

```csdiff
MessageBox.Show(@"I'm a multi 
line 
text 
in many 
line");
```

Exercise : [Data types](03-Data-Types-Exercise.md)

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/o1xAgJTEO8k?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>

---
