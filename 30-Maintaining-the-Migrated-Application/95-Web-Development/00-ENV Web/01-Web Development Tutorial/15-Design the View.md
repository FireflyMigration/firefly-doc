You can visually design the view by adding `?design=y` to the url and then copy the result `typescript` code into the orders class.

![2017 10 13 08H38 37](../2017-10-13_08h38_37.gif)

We'll make the following changes:
1.  Rename `id` column to be `Order Id` and make it `readonly`
2.  Change the `orderDate` column to be of input type `date`
3.  Remove the `EmployeeID` column

We'll copy the code into our typescript code and run it.
It should look like this:
`src/app/app.component.ts`

```csdiff
export class AppComponent {
  ordersGrid = new radweb.GridSettings(new models.Orders()
+ ,
+   {
+     columnSettings: orders => [
+       {
+         column: orders.id,
+         readonly: true
+       },
+       orders.customerID,
+       orders.employeeID,
+       orders.orderDate,
+       orders.requiredDate,
+       orders.shippedDate,
+       orders.shipVia,
+       orders.freight,
+       orders.shipName,
+       orders.shipAddress,
+       orders.shipCity,
+       orders.shipRegion,
+       orders.shipPostalCode,
+       orders.shipCountry
+     ]
+   }
  );
}
```
![2017 10 13 08H47 16](../2017-10-13_08h47_16.png)

### let's make some more changes:
1. We'll use the `numOfColumnsInGrid` setting to only show 4 columns
2. We'll move `shipVia` to be the 3rd column
3. we'll remove columns that we don't need (you can do it in the designer or the code)
```csdiff
export class AppComponent {
  ordersGrid = new radweb.GridSettings(new models.Orders(),
    {
+     numOfColumnsInGrid:4,
      columnSettings: orders => [
        {
          column: orders.id,
          readonly: true
        },
        orders.customerID,
-       orders.employeeID,
        orders.orderDate,
+       orders.shipVia,
        orders.requiredDate,
        orders.shippedDate,
-       orders.shipVia,
-       orders.freight,
-       orders.shipName,
        orders.shipAddress,
        orders.shipCity,
-       orders.shipRegion,
-       orders.shipPostalCode,
-       orders.shipCountry
      ]
    }
  );
}
```

It should now look like this:
![2017 10 13 08H53 10](../2017-10-13_08h53_10.png)