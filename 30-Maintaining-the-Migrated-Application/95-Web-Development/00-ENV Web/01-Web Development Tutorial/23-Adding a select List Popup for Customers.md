* Add the `<select-popup>` definition to the template
* Add a handler for the `click` of the column - in which we'll call the `showSelectPopup` method, and send it an arrow function so when the user selects, it'll update the `customerID` column in the `order` object based on the `id` of the selected `customer` object.

`src/app/app.component.ts`
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
                        this.customers.lookup.get({ id: o.customerID }).companyName,
+                   click: o => this.customers.showSelectPopup(c => o.customerID = c.id)
                },
                { key: "orderDate", inputType: "date" },
                {
                    key: "shipVia",
                    dropDown: { source: this.shippers },
                    cssClass:'col-sm-3'
                    cssClass: 'col-sm-3'

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
`src/app/app.component.html`
```csdiff
  <h1>Orders</h1>
  <data-grid [settings]="orders"></data-grid>
+ <select-popup [settings]="customers"></select-popup>
`
})

```

## Customise the select popup info

```csdiff
export class AppComponent {
    customers = new models.customers({
+       numOfColumnsInGrid:4,
+       columnSettings: [
+           { key: "id" },
+           { key: "companyName" },
+           { key: "contactName" },
+           { key: "country" },
+           { key: "address" },
+           { key: "city" },
        ]});
    shippers = new models.shippers();
    orders = new models.orders(
```

## The user experiance
![2017 10 15 09H13 21](2017-10-15_09h13_21.gif)