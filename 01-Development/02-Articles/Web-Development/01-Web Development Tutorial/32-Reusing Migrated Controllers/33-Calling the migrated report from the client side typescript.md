In `Orders.ts`
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    customers = new utils.Lookup<models.customer, string>(apiUrl + 'customers');
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number", cssClass:"col-sm-1" },
                { key: "customerID", caption: "CustomerID", cssClass: "col-sm-1" },
                { caption: "Customer Name", getValue: o => this.customers.get(o.customerID).companyName },
                { key: "orderDate", caption: "OrderDate", inputType: "date" },
                {
                    caption: "Day of Week", getValue: o => utils.getDayOfWeekName(o.orderDate),
                    cssClass: o => utils.getDayOfWeek(o.orderDate)==1? "bg-danger":""
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
                    
                },
                isGreaterOrEqualTo: {
                    orderDate:"1997-01-01"
                },
                orderBy:'orderDate'
            }
            },
+           rowButtons: [{ 
+               click: o => window.open('/home/print/' + o.id, '_blank'), 
+               cssClass:'glyphicon glyphicon-print' 
+           }]
            

        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/20d467c4f2d7e90ba8fc2c6e87c6fda63c10f354)

<iframe width="560" height="315" src="https://www.youtube.com/embed/zMnNw2f5xJo?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>