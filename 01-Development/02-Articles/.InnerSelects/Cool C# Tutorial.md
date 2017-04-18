```csdiff
Select OrderID, CustomerID, OrderDate,
isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = Orders.OrderID
),0)
From dbo.Orders 
Order by OrderID
```

```csdiff
Select top 1 OrderID, ProductID 
From dbo.[Order Details] 
Where OrderID = 10249
Order by OrderID, ProductID
```
```
Select OrderID, CustomerID, OrderDate 
From dbo.Orders 
Order by OrderID
```

```csdiff
using Firefly.Box;
using ENV.Data;
using ENV;
namespace Northwind
{
    /// <summary>Orders and Items Report(P#9)</summary>
    /// <remark>Last change before Migration: 18/04/2017 16:59:25</remark>
    internal class OrdersAndItemsReport : BusinessProcessBase 
    {
        #region Models
        internal readonly Models.Orders Orders = new Models.Orders { ReadOnly = true };
        readonly Models.Order_Details Order_Details = new Models.Order_Details { ReadOnly = true };
        #endregion
        #region Columns
        internal readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity", "5");
        readonly BoolColumn V_HasOrderDetails = new BoolColumn("V_HasOrderDetails");
        #endregion
        #region Streams
        ENV.Printing.PrinterWriter _ioPrinter;
        #endregion
        #region Layouts
        Printing.OrdersAndItemsReportC1 _layout { get { return Cached<Printing.OrdersAndItemsReportC1>(); } }
        #endregion
        public OrdersAndItemsReport()
        {
            Title = "Orders and Items Report";
            InitializeDataView();
        }
        void InitializeDataView()
        {
            From = Orders;
            
            Relations.Add(Order_Details, Order_Details.OrderID.IsEqualTo(Orders.OrderID), Order_Details.SortByPK_Order_Details);
            Relations[Order_Details].NotifyRowWasFoundTo(V_HasOrderDetails);
            
            OrderBy = Orders.SortByPK_Orders;
            #region Column Selection
            Columns.Add(Orders.OrderID);
            Columns.Add(Orders.CustomerID);
            Columns.Add(Orders.OrderDate);
            Columns.Add(TotalQuantity);
            Columns.Add(Order_Details.OrderID);
            Columns.Add(Order_Details.ProductID);
            Columns.Add(V_HasOrderDetails);
            #endregion
        }
        /// <summary>Orders and Items Report(P#9)</summary>
        public void Run()
        {
            Execute();
        }
        protected override void OnLoad()
        {
            AllowUserAbort = true;
            
            _ioPrinter = new ENV.Printing.PrinterWriter() { Name = "Printer", PrinterName = Shared.Printing.Printers.Printer1.PrinterName, PrintPreview = true };
            Streams.Add(_ioPrinter);
        }
        protected override void OnEnterRow()
        {
            TotalQuantity.Value = 0;
            if (V_HasOrderDetails)
                Cached<GetTotalQuantity>().Run();
            _layout.Orders.WriteTo(_ioPrinter);
        }
        /// <summary>Collect(P#9.1)</summary>
        /// <remark>Last change before Migration: 18/04/2017 16:53:45</remark>
        class GetTotalQuantity : BusinessProcessBase 
        {
            #region Models
            readonly Models.Order_Details Order_Details = new Models.Order_Details { ReadOnly = true };
            #endregion
            OrdersAndItemsReport _parent;
            public GetTotalQuantity(OrdersAndItemsReport parent)
            {
                _parent = parent;
                Title = "Collect";
                InitializeDataView();
            }
            void InitializeDataView()
            {
                From = Order_Details;
                Where.Add(Order_Details.OrderID.IsEqualTo(_parent.Orders.OrderID));
                
                OrderBy = Order_Details.SortByPK_Order_Details;
                #region Column Selection
                Columns.Add(Order_Details.OrderID);
                Columns.Add(Order_Details.Quantity);
                #endregion
            }
            /// <summary>Collect(P#9.1)</summary>
            internal void Run()
            {
                Execute();
            }
            protected override void OnLoad()
            {
                AllowUserAbort = true;
            }
            protected override void OnLeaveRow()
            {
                _parent.TotalQuantity.Value += Order_Details.Quantity;
            }
        }
    }
}

```
```csdiff
using Firefly.Box;
using ENV.Data;
using ENV;
namespace Northwind
{
    /// <summary>Orders and Items Report(P#9)</summary>
    /// <remark>Last change before Migration: 18/04/2017 16:59:25</remark>
    internal class OrdersAndItemsReport : BusinessProcessBase 
    {
        #region Models
        internal readonly Models.Orders Orders = new Models.Orders { ReadOnly = true };
        #endregion
        #region Columns
        internal readonly NumberColumn TotalQuantity = new NumberColumn("Total Quantity", "5");
        readonly BoolColumn V_HasOrderDetails = new BoolColumn("V_HasOrderDetails");
        #endregion
        #region Streams
        ENV.Printing.PrinterWriter _ioPrinter;
        #endregion
        #region Layouts
        Printing.OrdersAndItemsReportC1 _layout { get { return Cached<Printing.OrdersAndItemsReportC1>(); } }
        #endregion
        public OrdersAndItemsReport()
        {
            Title = "Orders and Items Report";
            InitializeDataView();
        }
        void InitializeDataView()
        {
            From = Orders;

            Orders.Columns.Add(V_HasOrderDetails);
            V_HasOrderDetails.Name = @"isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = Orders.OrderID
),0)";

            OrderBy = Orders.SortByPK_Orders;
            #region Column Selection
            Columns.Add(Orders.OrderID);
            Columns.Add(Orders.CustomerID);
            Columns.Add(Orders.OrderDate);
            Columns.Add(TotalQuantity);
           
            Columns.Add(V_HasOrderDetails);
            #endregion
        }
        /// <summary>Orders and Items Report(P#9)</summary>
        public void Run()
        {
            Execute();
        }
        protected override void OnLoad()
        {
            AllowUserAbort = true;
            
            _ioPrinter = new ENV.Printing.PrinterWriter() { Name = "Printer", PrinterName = Shared.Printing.Printers.Printer1.PrinterName, PrintPreview = true };
            Streams.Add(_ioPrinter);
        }
        protected override void OnEnterRow()
        {
            TotalQuantity.Value = 0;
            if (V_HasOrderDetails)
                Cached<GetTotalQuantity>().Run();
            _layout.Orders.WriteTo(_ioPrinter);
        }
        /// <summary>Collect(P#9.1)</summary>
        /// <remark>Last change before Migration: 18/04/2017 16:53:45</remark>
        class GetTotalQuantity : BusinessProcessBase 
        {
            #region Models
            readonly Models.Order_Details Order_Details = new Models.Order_Details { ReadOnly = true };
            #endregion
            OrdersAndItemsReport _parent;
            public GetTotalQuantity(OrdersAndItemsReport parent)
            {
                _parent = parent;
                Title = "Collect";
                InitializeDataView();
            }
            void InitializeDataView()
            {
                From = Order_Details;
                Where.Add(Order_Details.OrderID.IsEqualTo(_parent.Orders.OrderID));
                
                OrderBy = Order_Details.SortByPK_Order_Details;
                #region Column Selection
                Columns.Add(Order_Details.OrderID);
                Columns.Add(Order_Details.Quantity);
                #endregion
            }
            /// <summary>Collect(P#9.1)</summary>
            internal void Run()
            {
                Execute();
            }
            protected override void OnLoad()
            {
                AllowUserAbort = true;
            }
            protected override void OnLeaveRow()
            {
                _parent.TotalQuantity.Value += Order_Details.Quantity;
            }
        }
    }
}

```