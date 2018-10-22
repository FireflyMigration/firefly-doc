keywords:parallel, paralel, async

<iframe width="560" height="315" src="https://www.youtube.com/embed/P2D4F7YVivE" frameborder="0" allowfullscreen></iframe>

## Create the AsyncHelper class
```csdiff
public class ShowOrdersAsync:AsyncHelperBase
{
    public void Run(Text forCustomer = null)
    {
        RunAsync<ShowOrders>(c => c.Run(forCustomer));
    }
}
```
## Call in new thread
```csdiff
-new ShowOrders().Run(_controller.Customers.CustomerID);
+new ShowOrdersAsync().Run(_controller.Customers.CustomerID);
```