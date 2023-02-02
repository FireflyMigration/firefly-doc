keywords:InnerSelectHelper

When approaching performance problems, a lot of time I hear developers talking about moving the code to SQL stored procedures to solve them.   
Usually I disagree, many of the powers of SQL can be available easily in your code without the cost of rewriting the code in Store procedure, or even worth, maintaining the code in stored procedure.

The most effective tool is "Inner Selects".

In this two videos we'll use the `InnerSelectHelper` class to reduce 1660 SQL queries to 1, and improve performance by 75%.

To Learn more about the inner workings of using Inner Selects in the code see [Inner Select and SQL Evaluated Columns in depth](inner-select-and-sql-evaluated-columns-in-depth.html)

### Using the InnerSelectHelper
* Define the InnerSelectHelper class in the code
```csdiff
var h = new ENV.Data.InnerSelectHelper(this);
```
#### Create an Exist Inner Select
Parameters:
1. The column that will be used as the result
2. The Child entity to check in (in our case, the Order_Details entity)
3. The Where to use in that entity (in our case, the OrderID should match)
```csdiff
h.TurnToExist(V_HasOrderDetails, Order_Details, Order_Details.OrderID.IsEqualTo(Orders.OrderID));
```

#### Create a Sum Inner Select
Parameters:
1. The column that will be used as the result.
2. The column to sum in the Child entity (in our case, Quantity).
3. The Where to use in that entity (in our case, the OrderID should match)

```csdiff
h.TurnToSum(TotalQuantity, Order_Details.Quantity, Order_Details.OrderID.IsEqualTo(Orders.OrderID));
```

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/kOT8WViZVoI?list=PL1DEQjXG2xnKhg_Tj9SMezkmm9mzpy4to" frameborder="0" allowfullscreen></iframe>

