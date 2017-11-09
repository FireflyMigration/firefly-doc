```csdiff
class CollectData : BusinessProcessBase
{
    #region Models
    readonly Models.Customers Customers = new Models.Customers();
    readonly Models.Orders Orders = new Models.Orders();
    readonly Models.Order_Details Order_Details = new Models.Order_Details();
    readonly Models.ProductSalesInfo ProductSalesInfo1 = new Models.ProductSalesInfo();
    #endregion

+   NumberColumn SumQuantity = new NumberColumn(),
+       sumAmount = new NumberColumn();
    ProductSalesInfo _parent;
    public CollectData(ProductSalesInfo parent)
    {
        _parent = parent;
        Title = "Collect Data";
        InitializeDataView();
    }
    void InitializeDataView()
    {
-       From = Order_Details;
+       var gb = new ENV.Data.SQLGroupBy(Order_Details);
+       From = gb.Entity;

-       Relations.Add(Orders, RelationType.Join, Orders.OrderID.IsEqualTo(Order_Details.OrderID));
+       gb.AddJoin(Orders, Orders.OrderID.IsEqualTo(Order_Details.OrderID));

-       Relations.Add(Customers, RelationType.Join, Customers.CustomerID.IsEqualTo(Orders.CustomerID));
+       gb.AddJoin(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID));

+       gb.AddColumn(Order_Details.ProductID);
+       gb.AddSumColumn(SumQuantity, Order_Details.Quantity);
+       gb.AddAggregateColumn(sumAmount, "sum({0} * {1})", Order_Details.Quantity, Order_Details.UnitPrice);

        Relations.Add(ProductSalesInfo1, RelationType.InsertIfNotFound, ProductSalesInfo1.ProdID.BindEqualTo(Order_Details.ProductID), ProductSalesInfo1.SortByProdID);

-       Where.Add(CndRange(() => _parent.Country != "", Customers.Country.IsEqualTo(_parent.Country)));
+       gb.Where.Add(CndRange(() => _parent.Country != "", Customers.Country.IsEqualTo(_parent.Country)));

-       Where.Add(CndRangeBetween(Orders.OrderDate, () => _parent.FromDate != Date.Empty, _parent.FromDate, () => _parent.ToDate != Date.Empty, _parent.ToDate));
+       gb.Where.Add(CndRangeBetween(Orders.OrderDate, () => _parent.FromDate != Date.Empty, _parent.FromDate, () => _parent.ToDate != Date.Empty, _parent.ToDate));

              
_       OrderBy = Customers.SortByPK_Customers;
        #region Column Selection
-       Columns.Add(Customers.CustomerID);
-       Columns.Add(Customers.Country);
-       Columns.Add(Orders.OrderID);
-       Columns.Add(Orders.CustomerID);
-       Columns.Add(Orders.OrderDate);
-       Columns.Add(Order_Details.OrderID);
        Columns.Add(Order_Details.ProductID);
-       Columns.Add(Order_Details.UnitPrice);
-       Columns.Add(Order_Details.Quantity);
-       Columns.Add(Order_Details.Discount);
+       Columns.Add(SumQuantity, sumAmount);

        Columns.Add(ProductSalesInfo1.ProdID);
        Columns.Add(ProductSalesInfo1.Quantity);
        Columns.Add(ProductSalesInfo1.Amount);
        #endregion
    }
    /// <summary>Collect Data(P#13.1)</summary>
    internal void Run()
    {
        Execute();
    }

    protected override void OnLeaveRow()
    {
-       ProductSalesInfo1.Quantity.Value += Order_Details.Quantity;
+       ProductSalesInfo1.Quantity.Value += SumQuantity;

-       ProductSalesInfo1.Amount.Value += Order_Details.UnitPrice * Order_Details.Quantity;
+       ProductSalesInfo1.Amount.Value += sumAmount;
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/dTofX4CNYAI?list=PL1DEQjXG2xnLp-A7typjUccfykKPenrer" frameborder="0" allowfullscreen></iframe>