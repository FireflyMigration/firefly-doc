`src//home/home.component.ts`
```csdiff
export class AppComponent {
  ordersGrid = new radweb.GridSettings(new models.Orders(),
    {
      numOfColumnsInGrid: 4,
      allowUpdate: true,
      columnSettings: orders => [
        {
          column: orders.id,
          readonly: true
        },
        {
          column: orders.customerID,
          getValue: orders =>
            orders.lookup(new models.Customers(), orders.customerID).companyName,
        },
        orders.orderDate,
-       orders.shipVia,
+       {
+         column: orders.shipVia,
+         dropDown: {
+           source: new models.Shippers()
+         }
+       },
        orders.requiredDate,
        orders.shippedDate,
        orders.shipAddress,
        orders.shipCity
      ]
    }
  );
}
```
### We'll also make the column a bit wider by using bootstrap css classes
```csdiff
export class AppComponent {
  ordersGrid = new radweb.GridSettings(new models.Orders(),
    {
      numOfColumnsInGrid: 4,
      allowUpdate: true,
      columnSettings: orders => [
        {
          column: orders.id,
          readonly: true
        },
        {
          column: orders.customerID,
          getValue: orders =>
            orders.lookup(new models.Customers(), orders.customerID).companyName,
        },
        orders.orderDate,
        {
          column: orders.shipVia,
          dropDown: {
            source: new models.Shippers()
          },
+         cssClass:'col-sm-3'
        },
        orders.requiredDate,
        orders.shippedDate,
        orders.shipAddress,
        orders.shipCity
      ]
    }
  );
}

```
### the User Experience
* The user selects from a drop down
* The filter also uses a drop down
* When the column is readonly, the correct description is presented

![2017 10 15 08H52 53](2017-10-15_08h52_53.gif)
