`src/app/app.component.ts`
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
            { key: "orderDate", inputType: "date" },
            {
                key: "shipVia",
                dropDown: { source: this.shippers },
                cssClass: 'col-sm-3'
            }
        ],
+       rowButtons: [
+           {
+               click: o => window.open('home/print/' + o.id),
+               cssClass: 'btn btn-primary glyphicon glyphicon-print'
+           }
+       ]
    }
);
```
* We've added the `rowButtons` array to the settings of the `orders` object
* We've added a button, and handled the `click` event - that received an `order` object, and printed based on that `order` `id`
* We've used bootstrap's `btn btn-primary glyphicon glyphicon-print` css classes to style the button and display it's printer icon, based on the icons that come with bootstrap, as explained in https://getbootstrap.com/docs/3.3/components/

![2017 10 16 06H47 20](2017-10-16_06h47_20.png)