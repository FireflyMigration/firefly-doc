* Let's add a relation to our demo
```csdiff
public class DemoColumnsCollection : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
+   public readonly Models.Customers Customers = new Models.Customers();
    public DemoColumnsCollection()
    {
        From = Orders;
+       Relations.Add(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID));

        Columns.Add(Orders.OrderID);
        Columns.Add(Orders.CustomerID);
        Columns.Add(Orders.OrderDate);
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

#### Relations will only recompute based on columns that were added before the relation’s first column in the column collection
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
+       Columns.Add(Customers.CustomerID);
        Columns.Add(Orders.OrderDate);
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

* Note that if the `Columns.Add` of the `Customers.CustomerID` column is **after** the call to `Columns.Add` of the `Orders.CustomerID` column, the relation to `Customers` will automatically recompute (refresh) whenever the value of `Orders.CustomerID` changes
* Note that if the `Columns.Add` of the `Customers.CustomerID` column is **Before** the call to `Columns.Add` of the `Orders.CustomerID` column, the relation to `Customers`  will **NOT** automatically recompute (refresh) whenever the value of `Orders.CustomerID` changes, it'll only evaluate once when you enter the row.
* Note that you can also use the `__RecomputePath` property to explore the recompute of a relation. For more information see [Columns Recompute](columns-recompute.html)
<iframe width="560" height="315" src="https://www.youtube.com/embed/SO8B_WDDycc?list=PL1DEQjXG2xnLhBFafjdkhUD_rDsiXiXHr" frameborder="0" allowfullscreen></iframe>

