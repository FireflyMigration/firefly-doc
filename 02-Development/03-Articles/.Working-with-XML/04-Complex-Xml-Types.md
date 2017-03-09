* We want to include in Details of the Order in our Xml.
* Add an `OrderDetailPoco` class
* Add a `Details` field to the `OrderPoco` class

```csdiff
namespace Northwind.Training.PocosAndXml
{
    public class OrderPoco
    {
        public int OrderID;
        public string CustomerID;
        public int Shipper;
+       public List<OrderDetailsPoco> Details = new List<OrderDetailsPoco>();
    }
+   public class OrderDetailsPoco
+   {
+       public int ProductID;
+       public decimal Quantity;
+       public decimal UnitPrice;
+   }
}

```

Adding the Order Details Info from code
```csdiff
 private void DemoWriteXml()
{
    var o = new OrderPoco
    {
        OrderID = 1,
        CustomerID = "ABCDE",
        Shipper = 5
    };
+   o.Details.Add(new OrderDetailsPoco {
+       ProductID = 1,
+       Quantity = 3,
+       UnitPrice = 10.5m
+   });
+   o.Details.Add(new OrderDetailsPoco
+   {
+       ProductID = 2,
+       Quantity =73,
+       UnitPrice = 55
+   });
    SaveXml(o, @"c:\temp\orders.xml");
}
```
