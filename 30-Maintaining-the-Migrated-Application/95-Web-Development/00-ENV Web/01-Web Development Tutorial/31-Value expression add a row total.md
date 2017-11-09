`src/app/app.component.ts`
```csdiff
products = new models.products();
orderDetails = new models.orderDetails({
    allowUpdate: true,
    allowInsert: true,
    allowDelete: true,
    columnSettings: [
        { key: "productID", caption: "Product", dropDown: { source: this.products } },
        { key: "unitPrice", inputType: "number" },
        { key: "quantity", inputType: "number" },
+       {
+           caption: "total",
+           getValue: o => (o.quantity * o.unitPrice).toFixed(2)
+       }
    ],
    onNewRow: od => {
        od.orderID = this.orders.currentRow.id;
        od.quantity = 1;
    }
});
orders = new models.orders(

```

![2017 10 16 06H16 56](2017-10-16_06h16_56.gif)