keywords:Not added to the columns collection or task was not executed,ColumnNotAddedToColumnCollection
The Columns Collection has two roles:
* Determine which columns will be loaded from the database
* Controls the Recompute mechanism which affects BindValue and Relations


### Determine which columns will be loaded from the database
* By Default - If no column were added using "Columns.Add" then all the columns which belongs to entities used in this controller will be added. (“Local columns” will not be added as part of this rule)
* Columns are added using the "Columns.Add" method
* PrimaryKey columns are added automatically
* Any column that is set as a Data of a control on the View is automatically added.

```csdiff
    public class DemoColumnsCollection : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public DemoColumnsCollection()
        {
            From = Orders;

+           Columns.Add(Orders.OrderID);
+           Columns.Add(Orders.CustomerID);
+           Columns.Add(Customers.CustomerID);
+           Columns.Add(Orders.OrderDate);
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


* Columns that were not added to the columns collection will provide the error "Not added to the columns collection or task was not executed", or the exception "ColumnNotAddedToColumnCollection"
* Columns can also be added using a comma separated parameter
```csdiff
    public class DemoColumnsCollection : UIControllerBase
    {
        public readonly Models.Orders Orders = new Models.Orders();
        public DemoColumnsCollection()
        {
            From = Orders;

+           Columns.Add(Orders.OrderID, Orders.CustomerID, Orders.OrderDate);
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

[The Column collection Power Point Presentation](ColumnCollection.pptx)

<iframe width="560" height="315" src="https://www.youtube.com/embed/ti87yg2hTyE?list=PL1DEQjXG2xnLhBFafjdkhUD_rDsiXiXHr" frameborder="0" allowfullscreen></iframe>

---

