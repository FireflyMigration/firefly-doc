Let's start by allowing insert, update and delete for `orderDetails`
`src/app/app.component.ts`
```csdiff
shippers = new models.shippers();
orderDetails = new models.orderDetails({
+       allowUpdate: true,
+       allowInsert: true,
+       allowDelete: true
    });
orders = new models.orders(
```

Now lets use the `onNewRow` event to set the default for order id
```csdiff
shippers = new models.shippers();
orderDetails = new models.orderDetails({
    allowUpdate: true,
    allowInsert: true,
    allowDelete: true,
+   onNewRow: od => od.orderID = this.orders.currentRow.id
});
orders = new models.orders(
```

Let's extend that to also set the default for quantity to 1. We'll change the arrow function to be a multi line one.

```csdiff
orderDetails = new models.orderDetails({
    allowUpdate: true,
    allowInsert: true,
    allowDelete: true,
-   onNewRow: od => od.orderID = this.orders.currentRow.id
+   onNewRow: od => {
+       od.orderID = this.orders.currentRow.id;
+       od.quantity = 1;
+   }
});
orders = new models.orders(

```