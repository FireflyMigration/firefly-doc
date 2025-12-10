# Optimizing Parent-Child Row Retrieval with Inner Select Helper

Retrieving parent and child rows efficiently is a common requirement in database-driven applications. For example, when printing orders and their details, the naive approach often results in multiple queries being executed—one for each order. This can lead to significant performance issues.

## The Problem: Multiple Queries per Order

Consider the following code snippet:

```csdiff
class WriteOrders : BusinessProcessBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Order_Details OrderDetails = new Models.Order_Details();
    public void Run()
    {
        From = Orders;
        using (var fw = new FileWriter(@"c:\\temp\\orders.txt"))
        {
            ForEachRow(() =>
            {
                fw.WriteLine("Order: " + Orders.OrderID);
                var bp = new BusinessProcess { From = OrderDetails };
                bp.Where.Add(OrderDetails.OrderID.IsEqualTo(Orders.OrderID));
                bp.ForEachRow(() =>
                {
                    fw.WriteLine($"{OrderDetails.ProductID},{OrderDetails.Quantity},{OrderDetails.UnitPrice}");
                });
            });
        }
    }
}
```

This code generates the following output:

```
Order:      10248
         11,    12,        14.000
         42,    10,         9.800
         72,     5,        34.800
Order:      10249
         14,     9,        18.600
         51,    40,        42.400
...
```

However, the problem with this approach is that for each order, it runs a separate query to retrieve order details. This results in a pattern known as the **N+1 query problem**, where:

1. The first query retrieves all orders:

   ```sql
   SELECT OrderID, CustomerID, EmployeeID, OrderDate, RequiredDate, ShippedDate, ShipVia, Freight, ShipName, ShipAddress, ShipCity, ShipRegion, ShipPostalCode, ShipCountry
   FROM dbo.Orders
   ORDER BY OrderID;
   ```

2. Then, for each order, another query is executed:

   ```sql
   SELECT OrderID, ProductID, UnitPrice, Quantity, Discount
   FROM dbo.[Order Details]
   WHERE OrderID = @0
   ORDER BY OrderID, ProductID;
   ```

   This results in **one additional query per order**, leading to poor performance.

## The Solution: Inner Select Helper

To optimize performance, we can use the **Inner Select Helper**, which allows fetching parent and child records in a single query. You can find the helper in [this GitHub Gist](https://gist.github.com/noam-honig/4619219f137d0b416cd29fef89d52404).

### Optimized Code with Inner Select Helper

```csdiff
class WriteOrders : BusinessProcessBase
{
    public readonly Models.Orders Orders = new Models.Orders();
    public readonly Models.Order_Details OrderDetails = new Models.Order_Details();
    public void Run()
    {
        From = Orders;
+        var ish = new InnerSelectHelper(this);
+        var orderDetailsColumn = ish.ChildRows(OrderDetails.OrderID.IsEqualTo(Orders.OrderID),
+            OrderDetails.ProductID, OrderDetails.Quantity, OrderDetails.UnitPrice);
        using (var fw = new FileWriter(@"c:\\temp\\orders.txt"))
        {
            ForEachRow(() =>
            {
                fw.WriteLine("Order: " + Orders.OrderID);
-               var bp = new BusinessProcess { From = OrderDetails };
-               bp.Where.Add(OrderDetails.OrderID.IsEqualTo(Orders.OrderID));
-               bp.ForEachRow(() =>
+               orderDetailsColumn.ForEachRow(() =>
                {
                    fw.WriteLine($"{OrderDetails.ProductID},{OrderDetails.Quantity},{OrderDetails.UnitPrice}");
                });
            });
        }
    }
}
```

### The Performance Improvement

This revised implementation retrieves all necessary data in **one query**:

```sql
SELECT
    OrderID,
    ISNULL((
        SELECT STRING_AGG(TRIM(CONVERT(VARCHAR, ProductID)) + '{|}' + TRIM(CONVERT(VARCHAR, Quantity)) + '{|}' + TRIM(CONVERT(VARCHAR, UnitPrice)), '{||}')
        FROM dbo.[Order Details] WHERE OrderID = dbo.Orders.OrderID
    ), '')
FROM dbo.Orders
ORDER BY OrderID;
```

### How It Works

- The query **aggregates child rows** using `STRING_AGG`, concatenating them into a single string with a `{||}` separator.
- The `ChildRows` method then **parses** this string, making the child records easily accessible.
- The `ForEachRow` method iterates over the parsed child records, avoiding extra database queries.

### Benefits

- **Eliminates the N+1 query problem**: Instead of executing multiple queries, all data is retrieved in one request.
- **Improves performance**: Significantly reduces database round trips, leading to faster execution.
- **Simplifies code**: No need for a nested `BusinessProcess`, making the logic cleaner and more maintainable.

By leveraging the **Inner Select Helper**, you can drastically improve the efficiency of retrieving parent-child records in your applications. 🚀


