###Let us add our first C# Class:  
- using the "Solution Explorer" Find the NorthWind startup project.
- Right click on the project name and select "Add" then select "New Folder".
- Change the name of the new Folder to "Exercises".
- Right click the new folder you just created and select "Add" then select "New Item"
- From the "Add New Item" screen, select Class
- Name your new Class **"MyFirstClass"** and click the "Add" button.

Your new Class supposed to look like this code :

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
    }
}
```
###Add our first Method:
- Add to your new class A Run Method

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

        }
    }
}
```

###Add a message
- Add the code to show a "Hello C#" message to the end user

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
            System.Windows.Forms.MessageBox.Show("Hello C#");
        }
    }
}
```
###Build and Run
