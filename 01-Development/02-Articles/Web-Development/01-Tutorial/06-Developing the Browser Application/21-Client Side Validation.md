1. Basic Validation
```csdiff
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number" },
                { key: "customerID", caption: "CustomerID" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                { key: "shipVia", caption: "ShipVia", inputType: "number" },
            ],
+           onSavingRow: modelState => {
+               if (modelState.row.orderDate < "1990-01-01")
+                   modelState.addError("orderDate", "invalid date");
+           },
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
                    customerID:"HANAR"
                },
                isGreaterOrEqualTo: {
                    orderDate:"1997-01-01"
                },
                orderBy:'orderDate'
            }
        });
}
```
2. Built in required validation
```csdiff
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number" },
                { key: "customerID", caption: "CustomerID" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                { key: "shipVia", caption: "ShipVia", inputType: "number" },
            ],
            onSavingRow: modelState => {
+               modelState.required('shipVia');
                if (modelState.row.orderDate < "1990-01-01")
                    modelState.addError("orderDate", "invalid date");
            },
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
                    customerID:"HANAR"
                },
                isGreaterOrEqualTo: {
                    orderDate:"1997-01-01"
                },
                orderBy:'orderDate'
            }
        });
}
```

```csdiff
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number" },
                { key: "customerID", caption: "CustomerID" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                { key: "shipVia", caption: "ShipVia", inputType: "number" },
            ],
+           onSavingRow: ms => {
+               ms.required('shipVia');
+               ms.required('customerID');
+               if (ms.row.orderDate < "1990-01-01")
+                   ms.addError("orderDate", "invalid date");
+           },
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
                    customerID:"HANAR"
                },
                isGreaterOrEqualTo: {
                    orderDate:"1997-01-01"
                },
                orderBy:'orderDate'
            }
        });
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/a09ebc1d44232ccfd795b40f48f3677acff73e12)

<iframe width="560" height="315" src="https://www.youtube.com/embed/Nom2T8G0YkI?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
