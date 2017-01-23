# Filtering Data
1.	Add the following filter: 
```diff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
+       Where.Add(Orders.ShipCity.IsEqualTo("London"));
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
2.	Notice that like IsEqualTo, there are more methods for IsGreater, IsLessThan, IsBetween etc.
3.	Run the application and check the results. 
4.	Extend the previous example by adding an “Or” part to the Where.Add line, as follows:
```diff
public class ShowOrders : UIControllerBase
{

    public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
        From = Orders;
-       Where.Add(Orders.ShipCity.IsEqualTo("London"));
+       Where.Add(Orders.ShipCity.IsEqualTo("London").Or(Orders.ShipCity.IsEqualTo("Madrid")));
+       Where.Add(Orders.ShipName.IsDifferentFrom(""));
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
 
5.	Notice that like .Or there is also .And.
6.	There are other ways to add this filter like using the SQL “In” function. The purpose here is to demonstrate the use of the Or method.
7.	Run the application and check the results.
8.	It’s possible to add multiple filter lines as follows:
 Note that there is an “AND” relationship between the Where.Add lines, as implied by the method name: “Add”. 
9.	Run the application and check the results.
10. Notice that  there is a lot more about filtering (Using expressions etc), that will be covered later on.
11. Exercise: Filtering Data


