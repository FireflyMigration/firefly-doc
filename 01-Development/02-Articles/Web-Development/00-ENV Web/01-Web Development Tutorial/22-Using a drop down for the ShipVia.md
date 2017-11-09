`src/app/app.component.ts`
```csdiff
export class AppComponent {
    customers = new models.customers();
+   shippers = new models.shippers();
    orders = new models.orders(
        {
            numOfColumnsInGrid: 4,
            allowUpdate: true,
            allowInsert: true,
            allowDelete: true,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                {
                    key: "customerID",
                    getValue: o =>
                        this.customers.lookup.get({ id: o.customerID }).companyName
                },
                { key: "orderDate", inputType: "date" },
                {
                    key: "shipVia",
+                   dropDown: { source : this.shippers }
                },
                { key: "requiredDate", inputType: "date" },
                { key: "shippedDate", inputType: "date" },
                { key: "shipAddress" },
                { key: "shipCity" },
            ]
        }
    );
}
```
### We'll also make the column a bit wider by using bootstrap css classes
```csdiff
export class AppComponent {
    customers = new models.customers();
    shippers = new models.shippers();
    orders = new models.orders(
        {
            numOfColumnsInGrid: 4,
            allowUpdate: true,
            allowInsert: true,
            allowDelete: true,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                {
                    key: "customerID",
                    getValue: o =>
                        this.customers.lookup.get({ id: o.customerID }).companyName
                },
                { key: "orderDate", inputType: "date" },
                {
                    key: "shipVia",
                    dropDown: { source: this.shippers },
+                   cssClass:'col-sm-3'
                },
                { key: "requiredDate", inputType: "date" },
                { key: "shippedDate", inputType: "date" },
                { key: "shipAddress" },
                { key: "shipCity" },
            ]
        }
    );
}

```
### the User Experiance
* The user selects from a drop down
* The filter also uses a drop down
* When the column is readonly, the correct description is presented

![2017 10 15 08H52 53](2017-10-15_08h52_53.gif)