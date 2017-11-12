Here are the steps we used when merging these two Controllers:
## 1. Move the models section from the `CollectOrderDetails` controller to the `CollectOrders` controller
```csdiff
/// <summary>CollectOrders(P#13.1.1)</summary>
/// <remark>Last change before Migration: 07/08/2017 12:13:58</remark>
class CollectOrders : BusinessProcessBase 
{
    #region Models
    readonly Models.Orders Orders = new Models.Orders ();
+   readonly Models.Order_Details Order_Details = new Models.Order_Details ();
+   readonly Models.ProductSalesInfo ProductSalesInfo1 = new Models.ProductSalesInfo ();
    #endregion
    CollectData _parent;
    public CollectOrders(CollectData parent)
    {
...


    /// <summary>CollectOrder Details(P#13.1.1.1)</summary>
    /// <remark>Last change before Migration: 07/08/2017 12:15:39</remark>
    class CollectOrderDetails : BusinessProcessBase 
    {
-       #region Models
-       readonly Models.Order_Details Order_Details = new Models.Order_Details ();
-       readonly Models.ProductSalesInfo ProductSalesInfo1 = new Models.ProductSalesInfo ();
-       #endregion
        CollectOrders _parent;
        public CollectOrderDetails(CollectOrders parent)
        {
            _parent = parent;
            Title = "CollectOrder Details";
            InitializeDataView();
        }
...
```

## 2. Change the `From` property of the `CollectOrders` controller to `Order_Details` and add a relation to the `Orders`  Entity
```csdiff
public CollectOrders(CollectData parent)
{
    _parent = parent;
    Title = "CollectOrders";
    InitializeDataView();
}
void InitializeDataView()
{
-   From = Orders;
+   From = Order_Details;
+   Relations.Add( Orders, RelationType.Join,Orders.OrderID.IsEqualTo(Order_Details.OrderID));


    Where.Add(Orders.CustomerID.IsEqualTo(_parent.Customers.CustomerID));
    Where.Add(CndRangeBetween(Orders.OrderDate, () => _parent._parent.FromDate != Date.Empty, _parent._parent.FromDate, () => _parent._parent.ToDate != Date.Empty, _parent._parent.ToDate));
     ...
class CollectOrderDetails : BusinessProcessBase 
{
...
    void InitializeDataView()
    {
-       From = Order_Details;
                        
        Relations.Add(ProductSalesInfo1, RelationType.InsertIfNotFound, ProductSalesInfo1.ProdID.BindEqualTo(Order_Details.ProductID), ProductSalesInfo1.SortByProdID);
                        
-       Where.Add(Order_Details.OrderID.IsEqualTo(_parent.Orders.OrderID));
                        
        OrderBy = Order_Details.SortByPK_Order_Details;
```
## 3. Move the InsertIfNotFound relation to the `ProductSalesInfo1` to `CollectOrders` controller
```csdiff
public CollectOrders(CollectData parent)
{
    _parent = parent;
    Title = "CollectOrders";
    InitializeDataView();
}
void InitializeDataView()
{
    From = Order_Details;
    Relations.Add( Orders, RelationType.Join,Orders.OrderID.IsEqualTo(Order_Details.OrderID));

+   Relations.Add(ProductSalesInfo1, RelationType.InsertIfNotFound, ProductSalesInfo1.ProdID.BindEqualTo(Order_Details.ProductID), ProductSalesInfo1.SortByProdID);

    Where.Add(Orders.CustomerID.IsEqualTo(_parent.Customers.CustomerID));
    Where.Add(CndRangeBetween(Orders.OrderDate, () => _parent._parent.FromDate != Date.Empty, _parent._parent.FromDate, () => _parent._parent.ToDate != Date.Empty, _parent._parent.ToDate));
     ...
class CollectOrderDetails : BusinessProcessBase 
{
...
    void InitializeDataView()
    {
-       Relations.Add(ProductSalesInfo1, RelationType.InsertIfNotFound, ProductSalesInfo1.ProdID.BindEqualTo(Order_Details.ProductID), ProductSalesInfo1.SortByProdID);
                        
        OrderBy = Order_Details.SortByPK_Order_Details;


```

## 4. Move the Columns from the `CollectOrderDetails` controller to the `CollectOrders`

```csdiff
public CollectOrders(CollectData parent)
{
    _parent = parent;
    Title = "CollectOrders";
    InitializeDataView();
}
void InitializeDataView()
{
    From = Order_Details;
    Relations.Add( Orders, RelationType.Join,Orders.OrderID.IsEqualTo(Order_Details.OrderID));

    Relations.Add(ProductSalesInfo1, RelationType.InsertIfNotFound, ProductSalesInfo1.ProdID.BindEqualTo(Order_Details.ProductID), ProductSalesInfo1.SortByProdID);

    Where.Add(Orders.CustomerID.IsEqualTo(_parent.Customers.CustomerID));
    Where.Add(CndRangeBetween(Orders.OrderDate, () => _parent._parent.FromDate != Date.Empty, _parent._parent.FromDate, () => _parent._parent.ToDate != Date.Empty, _parent._parent.ToDate));
                        
    OrderBy = Orders.SortByCustomerID;
    #region Column Selection
    Columns.Add(Orders.OrderID);
    Columns.Add(Orders.CustomerID);
    Columns.Add(Orders.OrderDate);
+   Columns.Add(Order_Details.OrderID);
+   Columns.Add(Order_Details.ProductID);
+   Columns.Add(Order_Details.UnitPrice);
+   Columns.Add(Order_Details.Quantity);
+   Columns.Add(Order_Details.Discount);
+   Columns.Add(ProductSalesInfo1.ProdID);
+   Columns.Add(ProductSalesInfo1.Quantity);
+   Columns.Add(ProductSalesInfo1.Amount);
    #endregion
}

     ...
class CollectOrderDetails : BusinessProcessBase 
{
...
    void InitializeDataView()
    {
                        
        OrderBy = Order_Details.SortByPK_Order_Details;
-       #region Column Selection
-       Columns.Add(Order_Details.OrderID);
-       Columns.Add(Order_Details.ProductID);
-       Columns.Add(Order_Details.UnitPrice);
-       Columns.Add(Order_Details.Quantity);
-       Columns.Add(Order_Details.Discount);
-       Columns.Add(ProductSalesInfo1.ProdID);
-       Columns.Add(ProductSalesInfo1.Quantity);
-       Columns.Add(ProductSalesInfo1.Amount);
-       #endregion



```
## 5. Move the `OnLeaveRow` logic from  `CollectOrderDetails` to `CollectOrders`
```csdiff
class CollectOrders : BusinessProcessBase 
{
...
protected override void OnLeaveRow()
{
-   Cached<CollectOrderDetails>().Run();
+   ProductSalesInfo1.Quantity.Value += Order_Details.Quantity;
+   ProductSalesInfo1.Amount.Value += Order_Details.UnitPrice * Order_Details.Quantity;

}
...
class CollectOrderDetails : BusinessProcessBase 
{
...
    protected override void OnLeaveRow()
    {
-       ProductSalesInfo1.Quantity.Value += Order_Details.Quantity;
-       ProductSalesInfo1.Amount.Value += Order_Details.UnitPrice * Order_Details.Quantity;
    }
...
}
```

## 6. Delete the `CollectOrderDetails` Since you're no longer using it.

## That's it, you're done.

<iframe width="560" height="315" src="https://www.youtube.com/embed/9v2oRRAbEoE?list=PL1DEQjXG2xnLp-A7typjUccfykKPenrer" frameborder="0" allowfullscreen></iframe>