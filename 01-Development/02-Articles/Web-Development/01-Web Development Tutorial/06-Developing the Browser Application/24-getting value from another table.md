1. Expose the new table on the DataApiController.cs file
```csdiff
static DataApiController()
{
    _dataApi.Register(typeof(Northwind.Models.Categories));
    _dataApi.Register(typeof(Northwind.Models.Orders),true);
+   _dataApi.Register(typeof(Northwind.Models.Customers));
}
```
2. Add the interface to the models.ts file copied from the dataApi documentation
```csdiff
export interface category {
    id?: number;
    categoryName?: string;
    description?: string;
}

export interface order {
    id?: number;
    customerID?: string;
    employeeID?: number;
    orderDate?: string;
    requiredDate?: string;
    shippedDate?: string;
    shipVia?: number;
    freight?: number;
    shipName?: string;
    shipAddress?: string;
    shipCity?: string;
    shipRegion?: string;
    shipPostalCode?: string;
    shipCountry?: string;
}
+export interface customer {
+    id?: string;
+    companyName?: string;
+    contactName?: string;
+    contactTitle?: string;
+    address?: string;
+    city?: string;
+    region?: string;
+    postalCode?: string;
+    country?: string;
+    phone?: string;
+    fax?: string;
+}
```
In the `orders.ts` file
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
+   customers = new utils.Lookup<models.customer, string>(apiUrl + 'customers');
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnSettings: [
                { key: "id", caption: "OrderID", inputType: "number", cssClass:"col-sm-1" },
                { key: "customerID", caption: "CustomerID", cssClass: "col-sm-1" },
+               { caption: "Customer Name", getValue: o => this.customers.get(o.customerID).companyName },
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

        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/895312b56d209a675c539132cfdb14391ad7baee)

<iframe width="560" height="315" src="https://www.youtube.com/embed/DQjjbTcBKR8?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
