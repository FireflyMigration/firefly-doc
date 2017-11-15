keywords:cndrange
Dynamic filter is a great way to only send to the database, the conditions you actually need.

It allows you to delay the Where decisions until the very last moment

```csdiff
using Firefly.Box;
using ENV.Data;
using ENV;
using Firefly.Box.Flow;
+using Firefly.Box.Data.Advanced;
...

void InitializeDataView()
{
    From = Order_Details;

-    StartOnRowWhere.Add(CndRange(pOrderID != 0, Order_Details.OrderID.IsEqualTo(pOrderID)));
-    StartOnRowWhere.Add(Order_Details.ProductID.IsBetween(ProdID, () => u.If(ProdID != 0, ProdID, 9999999)));
+    StartOnRowWhere.Add(new DynamicFilter(fc =>
+    {
+        if (pOrderID != 0)
+            fc.Add(Order_Details.OrderID.IsEqualTo(pOrderID));
+        if (ProdID != 0)
+            fc.Add(Order_Details.ProductID.IsEqualTo(ProdID));
+    }));

           

    OrderBy.Add(Order_Details.OrderID);
 
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/OnbmcR25Lys?list=PL1DEQjXG2xnJwAfsOtNtwdstwzq20y-wp" frameborder="0" allowfullscreen></iframe>