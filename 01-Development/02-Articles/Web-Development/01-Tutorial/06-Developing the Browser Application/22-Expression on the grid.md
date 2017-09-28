
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number" },
                { key: "customerID", caption: "CustomerID" },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
+               { caption: "Day of Week", getValue: o => utils.getDayOfWeekName(o.orderDate) },
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

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/1808aeac2341a0096305470043b4c3038bb0256a)
<iframe width="560" height="315" src="https://www.youtube.com/embed/GjUsbPCo1V8?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
