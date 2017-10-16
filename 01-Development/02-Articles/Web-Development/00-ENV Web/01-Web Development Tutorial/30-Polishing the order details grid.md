* Select only the columns we want
* Set the caption, and drop down for product id
* set the input type for unitPrice and quantity

`Scripts\App\Orders.ts`
```csdiff
+shippers = new models.shippers();
products = new models.products();
orderDetails = new models.orderDetails({
    allowUpdate: true,
    allowInsert: true,
    allowDelete: true,
+   columnSettings: [
+       { key: "productID", caption: "Product", dropDown: { source: this.products } },
+       { key: "unitPrice", inputType: "number" },
+       { key: "quantity", inputType: "number" }
+   ],
    onNewRow: od => {
        od.orderID = this.orders.currentRow.id;
        od.quantity = 1;
    }
});
orders = new models.orders(
```

![Polishing The Order Detail Grid](Polishing-the-order-detail-grid.png)

