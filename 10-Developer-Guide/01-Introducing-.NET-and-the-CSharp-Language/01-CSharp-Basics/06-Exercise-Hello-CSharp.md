### Add the first C# Class:  
1. using the "Solution Explorer" Find the Northwind startup project.
1. Right click on the project name and select "Add" then select "New Folder".
1. Change the name of the new Folder to "Exercises".
1. Right click the new folder you just created and select "Add" then select "New Item"
1. From the "Add New Item" screen, select Class
1. Name your new Class **MyFirstClass** and click the "Add" button.

Your new Class supposed to look like this code :

```csdiff
+using System;
+using System.Collections.Generic;
+using System.Linq;
+using System.Text;
+using System.Threading.Tasks;
+
+namespace Northwind.Exercises
+{
+    class MyFirstClass
+    {
+    }
+}
```
### Add your first Method:
1. Add to your new class A Run Method

Your new Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind.Exercises
{
    class MyFirstClass
    {
+       public void Run()
+       {
+
+       }
    }
}
```

### Add a message
1. Add the code to show a "Hello C#" message to the end user

Your new Class supposed to look like this code:

```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Northwind.Exercises
{
    class MyFirstClass
    {
        public void Run()
        {
+           System.Windows.Forms.MessageBox.Show("Hello C#");
        }
    }
}
```
### Menu Item
1. Using the "Solution Explorer" open the "Views" folder at the startup project.
1. open the "ApplicationMdi.cs".
1. Add a new menu called **Exercises**.
1. Add a new entry called **Hello C#**.
1. Double click the new entry.
1. In the **Code Behind** Call the new class your just created

Your menu enter **Code Behind** should look like that :
```csdiff
+       private void helloCToolStripMenuItem_Click(object sender, EventArgs e)
+       {
+           new Exercises.MyFirstClass().Run();
+       }
```

**Build and Run**
