```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
+           columnSettings: [{
+               key: 'orderDate',
+               caption: "Order Date",
+               inputType:"date"
+           }],
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
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/00aefc7f5c5290a7aaa4e340b4250582b4c61036)

## We can also get the column settings from the dataApi documentation

```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
-           columnKeys: ["id", "customerID", "orderDate", "shipVia"],
+           columnSettings: [
+               { key: "id", caption: "OrderID", inputType: "number" },
+               { key: "customerID", caption: "CustomerID" },
+               { key: "orderDate", caption: "OrderDate", inputType: "date" },
+               { key: "shipVia", caption: "ShipVia", inputType: "number" },
+           ],
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
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/a09ebc1d44232ccfd795b40f48f3677acff73e12)




<iframe width="560" height="315" src="https://www.youtube.com/embed/OraP5aEhWvQ?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
