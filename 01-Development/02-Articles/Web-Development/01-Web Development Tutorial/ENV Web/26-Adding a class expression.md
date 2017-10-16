Let's say that we don't like Mondays, and we want that the date column will display a different background for Mondays

### css expression for a column
'Scripts\App\Orders.ts'
```csdiff
orders = new models.orders(
    {
        numOfColumnsInGrid: 4,
        get: { limit: 4 },
        onEnterRow: o => this.orderDetails.get({ isEqualTo: { orderID: o.id } }),
        allowUpdate: true,
        allowInsert: true,
        allowDelete: true,
        columnSettings: [
            { key: "id", caption: "Order ID", readonly: true },
            {
                key: "customerID",
                getValue: o =>
                    this.customers.lookup.get({ id: o.customerID }).companyName,
                click: o => this.customers.showSelectPopup(c => o.customerID = c.id)
            },
            {
                key: "orderDate", inputType: "date",
+               cssClass: o => new Date(o.orderDate).getDay()==1?"danger":""
            },
            {
                key: "shipVia",
                dropDown: { source: this.shippers },
                cssClass: 'col-sm-3'
            }
        ],
        rowButtons: [
            {
                click: o => window.open('home/print/' + o.id),
                cssClass: 'btn btn-primary glyphicon glyphicon-print'
            }
        ]
    }
);
```

We're using bootstrap's `danger` css style to highlight Mondays

![Mondays Are Danger](mondays-are-danger.png)

### css expression for the entire row
`Scripts\App\Orders.ts`
```csdiff
orders = new models.orders(
    {
        numOfColumnsInGrid: 4,
        get: { limit: 4 },
        onEnterRow: o => this.orderDetails.get({ isEqualTo: { orderID: o.id } }),
        allowUpdate: true,
        allowInsert: true,
        allowDelete: true,
        columnSettings: [
            { key: "id", caption: "Order ID", readonly: true },
            {
                key: "customerID",
                getValue: o =>
                    this.customers.lookup.get({ id: o.customerID }).companyName,
                click: o => this.customers.showSelectPopup(c => o.customerID = c.id)
            },
            {
                key: "orderDate", inputType: "date",
-               cssClass: o => new Date(o.orderDate).getDay()==1?"danger":""
            },
            {
                key: "shipVia",
                dropDown: { source: this.shippers },
                cssClass: 'col-sm-3'
            }
        ],
+       rowCssClass: o => new Date(o.orderDate).getDay() == 1 ? "danger" : "",
        rowButtons: [
            {
                click: o => window.open('home/print/' + o.id),
                cssClass: 'btn btn-primary glyphicon glyphicon-print'
            }
        ]
    }
);
```
![Css Style For The Row](css-style-for-the-row.png)