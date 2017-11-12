Set the `allowUpdate` property to true, and the grid is now updatable.
```csdiff
    orders = new models.orders(
        {
            numOfColumnsInGrid: 4,
+           allowUpdate:true,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                {
                    key: "customerID",
                    getValue: o =>
 
```

The screen should look like this:

![07 Updatable Orders Screen](img07-Updatable-Orders-Screen.png)

* Note that when you change the CustomerID, the Customer Name recomputes automatically.
* Also, when we try to save our changes, we get an error `The requested resource does not support http method 'PUT'.` - that's because we didn't make the RestAPI updatable yet, we'll do that in the next article