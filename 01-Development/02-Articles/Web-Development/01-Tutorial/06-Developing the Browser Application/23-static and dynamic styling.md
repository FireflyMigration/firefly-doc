Static Styling
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
-               { key: "id", caption: "OrderID", inputType: "number" },
+               { key: "id", caption: "OrderID", inputType: "number", cssClass:"col-sm-1" },
                { key: "customerID", caption: "CustomerID" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                { caption: "Day of Week", getValue: o => utils.getDayOfWeekName(o.orderDate) },
                { key: "shipVia", caption: "ShipVia", inputType: "number" },
            ],
            onSavingRow: ms => {
                ms.required('shipVia');
                ms.required('customerID');
                if (ms.row.orderDate < "1990-01-01")
                    ms.addError("orderDate", "invalid date");
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
[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/c708ffada4e2db80ef1064a8b0ea84dc3f8676ce)


Dynamic Styling:
```csdiff
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number", cssClass:"col-sm-1" },
                { key: "customerID", caption: "CustomerID", cssClass:"col-sm-1" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                {
                    caption: "Day of Week", getValue: o => utils.getDayOfWeekName(o.orderDate),
+                   cssClass: o => utils.getDayOfWeek(o.orderDate)==1? "bg-danger":""
                },
                { key: "shipVia", caption: "ShipVia", inputType: "number", cssClass:'col-sm-1' },
            ],
            onSavingRow: ms => {
                ms.required('shipVia');
                ms.required('customerID');
                if (ms.row.orderDate < "1990-01-01")
                    ms.addError("orderDate", "invalid date");
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

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/185304baceb01b63b58d07ac692dad9f26c22975)




<iframe width="560" height="315" src="https://www.youtube.com/embed/SiphoQHJmIk?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
