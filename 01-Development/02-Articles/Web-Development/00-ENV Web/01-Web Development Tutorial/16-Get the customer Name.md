Add the customers member:
```csdiff
...
export class Orders  {
+   customers = new models.customers();
    orders = new models.orders(
        {
            numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                { key: "customerID" },
...
```

Get the value from customers:

![2017 10 13 09H08 32](../2017-10-13_09h08_32.gif)

1. we set the `getValue` of the `customerID` column with an `Arrow Function`.
2. This function receives a parameter of type `order`, the order for which we want to find the customer.
3. We then call the `lookup.get` function, and search for a customer who's `id` equals the `customerID` or the current `order` (we can filter on any column)
4. Then we return the `companyName` column.
Note how we have intellisense in every step of the way - that's `TypeScript`

```csdiff
...
export class Orders  {
+   customers = new models.customers();
    orders = new models.orders(
        {
            numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                {
                    key: "customerID",
+                   getValue: o =>
+                       this.customers.lookup.get({ id: o.customerID }).companyName
                },
                { key: "orderDate", inputType: "date" },
                { key: "shipVia" },
                { key: "requiredDate", inputType:"date" },
                { key: "shippedDate" , inputType:"date" },
                { key: "shipAddress" },
                { key: "shipCity" },
            ]
        }
    );
}
...
```

Here is the result:

![2017 10 13 09H06 36](../2017-10-13_09h06_36.png)