
1. We replace the `customerID` column with a column definition, and set it's `column` to `customer.id`
2. we set the `getValue` of the column with an `Arrow Function`.
2. This function receives a parameter of type `Orders`, the order for which we want to find the customer.
3. We then call the `lookup` function, and search for a customer who's `id` equals the `customerID` or the current `Orders` (we can filter on any column)
4. Then we return the `companyName` column.
Note how we have intellisense in every step of the way - that's `TypeScript`

```csdiff
...
export class AppComponent {
  ordersGrid = new radweb.GridSettings(new models.Orders(),
    {
      numOfColumnsInGrid:4,
      columnSettings: orders => [
        {
          column: orders.id,
          readonly: true
        },
-       orders.customerID,
+       {
+         column: orders.customerID,
+         getValue: orders => 
+           orders.lookup(new models.Customers(),orders.customerID).companyName,
+       },
        orders.orderDate,
        orders.shipVia,
        orders.requiredDate,
        orders.shippedDate,
        orders.shipAddress,
        orders.shipCity
      ]
    }
  );
}

...
```

Here is the result:

![2017 10 13 09H06 36](../2017-10-13_09h06_36.png)