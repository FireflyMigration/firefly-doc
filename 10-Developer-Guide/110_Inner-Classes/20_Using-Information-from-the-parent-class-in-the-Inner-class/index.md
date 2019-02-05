* Let's use the Order_Details table in our inner controller

```csdiff
public class ShowOrdersToDemoInnerClasses : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly NumberColumn Items = new NumberColumn("Items", "2");
    public readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity", "4");
    public readonly NumberColumn TotalAmount = new NumberColumn("Total Amount", "5C");
    public ShowOrdersToDemoInnerClasses()
    {
        From = Orders;
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersToDemoInnerClassesView(this);
    }
    protected override void OnEnterRow()
    {
        new GetTotals(this).Run();
    }
    class GetTotals : BusinessProcessBase
    {
+       readonly Models.Order_Details Order_Details = new Models.Order_Details();
        ShowOrdersToDemoInnerClasses _parent;
        public GetTotals(ShowOrdersToDemoInnerClasses parent)
        {
            _parent = parent;
+           From = Order_Details;
        }
        public void Run()
        {
            Execute();
        }
    }
}
```
* To Filter the `GetTotals` inner controller based on the current order in the parent controller we'll add the following line:
```csdiff
public class ShowOrdersToDemoInnerClasses : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly NumberColumn Items = new NumberColumn("Items", "2");
    public readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity", "4");
    public readonly NumberColumn TotalAmount = new NumberColumn("Total Amount", "5C");
    public ShowOrdersToDemoInnerClasses()
    {
        From = Orders;
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersToDemoInnerClassesView(this);
    }
    protected override void OnEnterRow()
    {
        new GetTotals(this).Run();
    }
    class GetTotals : BusinessProcessBase
    {
        readonly Models.Order_Details Order_Details = new Models.Order_Details();
        ShowOrdersToDemoInnerClasses _parent;
        public GetTotals(ShowOrdersToDemoInnerClasses parent)
        {
            _parent = parent;
            From = Order_Details;
+           Where.Add(Order_Details.OrderID.IsEqualTo(_parent.Orders.OrderID));
        }
        public void Run()
        {
            Execute();
        }
    }
}
```
* We use the `_parent` field, to access the parent controller, and get the current value of the OrderID column in the Orders Entity.
* An inner class can access any of it's parent class fields, including `private` members - that is what makes it the perfect match for a migrated inner task.
* Now let's update the parent's local columns with the information we gather for each row.
```csdiff
public class ShowOrdersToDemoInnerClasses : UIControllerBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly NumberColumn Items = new NumberColumn("Items", "2");
    public readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity", "4");
    public readonly NumberColumn TotalAmount = new NumberColumn("Total Amount", "5C");
    public ShowOrdersToDemoInnerClasses()
    {
        From = Orders;
    }
    public void Run()
    {
        Execute();
    }
    protected override void OnLoad()
    {
        View = () => new Views.ShowOrdersToDemoInnerClassesView(this);
    }
    protected override void OnEnterRow()
    {
        new GetTotals(this).Run();
    }
    class GetTotals : BusinessProcessBase
    {
        readonly Models.Order_Details Order_Details = new Models.Order_Details();
        ShowOrdersToDemoInnerClasses _parent;
        public GetTotals(ShowOrdersToDemoInnerClasses parent)
        {
            _parent = parent;
            From = Order_Details;
            Where.Add(Order_Details.OrderID.IsEqualTo(_parent.Orders.OrderID));
        }
        public void Run()
        {
+           _parent.Items.Value = 0;
+           _parent.TotalQuantity.Value = 0;
+           _parent.TotalAmount.Value = 0;
            Execute();
        }
+       protected override void OnLeaveRow()
+       {
+           _parent.Items.Value++;
+           _parent.TotalQuantity.Value += Order_Details.Quantity;
+           _parent.TotalAmount.Value += Order_Details.Quantity * Order_Details.UnitPrice;
+       }
    }
}
```

* Note that inner classes are great and easy to use, but they are used a lot less in .NET than they were used in Magic. 
* Many of the subtasks you've written in magic, will be simple methods in .NET
* And in other cases, I would prefer to have a clear and separate controller, that will be easier to reuse than an inner class.

<iframe width="560" height="315" src="https://www.youtube.com/embed/A9gQ-Ob8ZDg?list=PL1DEQjXG2xnK8xPqBW89oPL6AHonic9Iz" frameborder="0" allowfullscreen></iframe>

