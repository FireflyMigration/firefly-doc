# Sorting Data
1.	Notice that our orders list is sorted by the OrderId, which is the default. 
2.	Let’s sort the list by the ShipCity, as follows: 
````csdiff
public class ShowOrders : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
        Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid");
        Where.Add(Orders.ShipName.IsDifferentFrom(""));
+       OrderBy.Add(Orders.ShipCity);
    }

    public void Run()
    {
        Execute();
    }

    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersView(this);
    }
}
````
3.	Run the application and check the results. 
4.	Add a second segment to the previous example, as follows:
```csdiff
public class ShowOrders : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
        Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid");
        Where.Add(Orders.ShipName.IsDifferentFrom(""));
        OrderBy.Add(Orders.ShipCity);
+       OrderBy.Add(Orders.OrderDate);
    }

    public void Run()
    {
        Execute();
    }

    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersView(this);
    }
}
````

5.	Run the application and check the results.
6.	Notice that the default direction is ascending and you can sort in descending order using a second OrderBy line, as follows:
```csdiff  
public class ShowOrders : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
        Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid");
        Where.Add(Orders.ShipName.IsDifferentFrom(""));
        OrderBy.Add(Orders.ShipCity);
+       OrderBy.Add(Orders.OrderDate,SortDirection.Descending);
    }

    public void Run()
    {
        Execute();
    }

    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersView(this);
    }
}
```
7.	Notice that the SortDirection has two options to choose from. This parameter type is called enum. enum is used whenever there is a parameter that accepts a close list of options.
8.	Run the application and check the results.
9.	A pre-defined index can also be used to sort the data: 
```csdiff
public class ShowOrders : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public ShowOrders()
        {
            From = Orders;
            Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid");
            Where.Add(Orders.ShipName.IsDifferentFrom(""));
            OrderBy.Add(Orders.ShipCity);
            OrderBy.Add(Orders.OrderDate,SortDirection.Descending);
+           OrderBy = Orders.SortByOrderDate;
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersView(this);
        }
    }
```
10. Modify the program so it will use the OrderDate index.
11. Run the application and check the results.


