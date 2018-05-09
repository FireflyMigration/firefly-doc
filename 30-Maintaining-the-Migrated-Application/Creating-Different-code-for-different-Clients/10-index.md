keywords:plugin, dependency injection, abstract factories

For software houses that maintain a product, there is the common problem of customer specific code.  
Sometimes we need to create some specific implementation of a specific program for a specific client.
The migrated code is designed using a plugin architecture, that allows you to implement this with ease.


We'll start by creating a new exe project that the customer will use - and call the original Northwind application.

Then we'll create our own client specific implementation of the `ShowCustomers` screen.

We'll register the new Controller with the `AbstractFactory` to return the customer implementation.

# Creating the Client specific exe project
1. Add a new winforms project called 'Northwind.AClient'
2. Delete 'Form.cs' and 'App.Config' as we don't need them. 
3. Delete the lines in the `Main` method in the `Program` class - we'll replace them later.
3. Change the build output to '..\bin\' for both debug and release.
1. Add references:
   * From the `Browse` tab, select from the project's `bin` directory the following dlls:
        1. ENV
        2. Firefly.Box
        3. NorthwindBase
        4. (Northwind.Share for larger migrated solutions)
> For more information see: [Adding a new project to a migrated solution](creating-different-code-for-different-clients.html)

5. change the program main to call the original Program main.
```csdiff
namespace Northwind.NewCustomer
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
-       static void Main()
+       static void Main(string[] args)
        {
+           Northwind.Program.Main(args);
        }
    }
}

```

<iframe width="560" height="315" src="https://www.youtube.com/embed/3slAqvZRCVY" frameborder="0" allowfullscreen></iframe>
