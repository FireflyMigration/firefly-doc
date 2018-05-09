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
            ENV.AbstractFactory.AddFactory(typeof(Customers.IShowCustomers), typeof(NewShowCustomersScreenForOurGreatNewCustomer));
+           OrderStrategy.Instance = new NewCustomerOrderStrategy();
            Northwind.Program.Main(args);
        }
    }
}

```

<iframe width="560" height="315" src="https://www.youtube.com/embed/sbTOtxnu-0A" frameborder="0" allowfullscreen></iframe>