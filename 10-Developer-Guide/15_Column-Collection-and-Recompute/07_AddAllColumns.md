* To add all the columns of all the Entities that are used in this controller to the columns collection, we can use the `AddAllColumns` method
* The `AddAllColumns` method will add all the columns that were not yet added.
* The `AddAllColumns` method will **not** add local columns
```csdiff
public class DemoColumnsCollection : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Customers Customers = new Models.Customers();
    public DemoColumnsCollection()
    {
        From = Orders;
        Relations.Add(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID));

        Columns.Add(Orders.OrderID);
        Columns.Add(Orders.CustomerID);
        Columns.Add(Customers.CustomerID);
        Columns.Add(Orders.OrderDate);
+       AddAllColumns();
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.DemoColumnsCollectionView(this);
    }
}
```
* To add all the columns of a specific relation to the columns collection, we can use the `AddAllColumns` method of a relation
```csdiff
public class DemoColumnsCollection : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Customers Customers = new Models.Customers();
    public DemoColumnsCollection()
    {
        From = Orders;
        Relations.Add(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID));

        Columns.Add(Orders.OrderID);
        Columns.Add(Orders.CustomerID);
        Columns.Add(Customers.CustomerID);
        Columns.Add(Orders.OrderDate);
+       Relations[Customers].AddAllColumns();
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.DemoColumnsCollectionView(this);
    }
}
```


 <iframe width="560" height="315" src="https://www.youtube.com/embed/jMP7WNJlamY?list=PL1DEQjXG2xnLhBFafjdkhUD_rDsiXiXHr" frameborder="0" allowfullscreen></iframe>

