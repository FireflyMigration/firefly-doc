1. Add the new Controller.
2. Implement the Interface
3. Register the Abstract Factory

```csdiff
namespace Northwind.NewCustomer
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main(string[] args)
        {
+           ENV.AbstractFactory.AddFactory(typeof(Customers.IShowCustomers), typeof(NewShowCustomersScreenForOurGreatNewCustomer));
            Northwind.Program.Main(args);
        }
    }
}

```

<iframe width="560" height="315" src="https://www.youtube.com/embed/iO1xFMDqPFQ" frameborder="0" allowfullscreen></iframe>