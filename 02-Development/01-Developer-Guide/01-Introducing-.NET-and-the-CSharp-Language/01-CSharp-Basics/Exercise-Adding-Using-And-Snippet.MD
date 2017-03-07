Let us add to the previous Class:
-	In the beginning of the file, add using directive to System.Windows.Forms namespace
-	Add another message box, using shorter syntax, to show the following message: “Learning C# is fun!”
-	Build and run.

### Using Snippet
-	Using the “mbox” snippet, add another message box to show the following message: “Snippets are cool!”
-	Build and run.

### Comments
- Add comments to describe your code.
- Build and run.

Your new Class supposed to look like this code:
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Northwind.Exercises
{
    class MyFirstClass
    {
        public void Run()
        {
            /*This is my first Class
             * this class will show 3 message box */
            System.Windows.Forms.MessageBox.Show("Hello C#");

            // Using using
            MessageBox.Show("Learning C# is fun!");

            // Using snippet 
            MessageBox.Show("Snippets are cool!");
        }
    }
}

```
