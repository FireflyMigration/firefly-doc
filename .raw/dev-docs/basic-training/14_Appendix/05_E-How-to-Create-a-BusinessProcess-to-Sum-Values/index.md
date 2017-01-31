### How to Create a BusinessProcess to Sum Values

```C#
public class ShowOrders1 : UIControllerBase
    {

        internal readonly Models.Orders Orders = new Models.Orders();
        internal readonly NumberColumn OrderTotal = new NumberColumn();

        public ShowOrders1()
        {
            From = Orders;
            View = () => new Views.ShowOrders1View(this);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnEnterRow()
        {
            new CalculateTotal(this).Run();
        }


        class CalculateTotal : BusinessProcessBase
        {
            Models.OrderDetails OrderDetails = new Models.OrderDetails();
            ShowOrders1 _parent;

            public CalculateTotal (ShowOrders1 parent)
            {
                _parent = parent;
                From = OrderDetails;
                Where.Add(OrderDetails.OrderID.IsEqualTo(_parent.Orders.OrderID));

            }

            protected override void OnStart()
            {
                _parent.OrderTotal.Value = 0;
            }
            protected override void OnLeaveRow()
            {
                _parent.OrderTotal.Value += OrderDetails.Quantity * OrderDetails.UnitPrice;
            }

            public void Run()
            {
                Execute();
            }
        }        
    }
```