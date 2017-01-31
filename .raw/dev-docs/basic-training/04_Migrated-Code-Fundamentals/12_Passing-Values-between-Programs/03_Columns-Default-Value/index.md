### Columns Default Value
1.	Run the application and open the “ShowOrders” screen.
2.	Click on the “Details” button to open the second screen.
3.	Press F4 to add a new line and note that the “OrderID” does not have a default value. This is a problem. If we want to keep data integrity, it is better bind the value of the column to the value of the input parameter.
4.	Let’s see how to do this. Go to the code of “ShowOrderDetails” and add the following :
```csdiff
public void Run(Number orderId)
{
+    OrderDetails.OrderID.BindValue(() => orderId);

    Where.Add(OrderDetails.OrderID.IsEqualTo(orderId));
    Execute();
}
```
5.	Switch to the screen designer and set the `AllowFocus` of the “OrderID” textbox to **false**.
![](Allow_Focus.png)
Build and notice that now when you add a new row, you get default value that cannot be changed.
As we can see in the above code, we are using the input parameter twice:
* As the default value of the Order ID column
* As the filter criteria of the Order ID column.

This is very common pattern, so we can combine them together using the `BindEqualTo` method, as follows:
```csdiff
public void Run(Number orderId)
{
-     OrderDetails.OrderID.BindValue(() => orderId);

-     Where.Add(OrderDetails.OrderID.IsEqualTo(orderId));
      Where.Add(OrderDetails.OrderID.BindEqualTo(orderId));
      Execute();
}
```
6. Exercise: Column Default Value


