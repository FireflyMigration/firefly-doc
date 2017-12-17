Let's start by allowing insert, update and delete for `orderDetails`
`src/app/app.component.ts`
```csdiff
  orderDetailsGrid = new radweb.GridSettings(new models.Order_details(),
+   {
+     allowUpdate: true,
+     allowDelete: true,
+     allowInsert:true
+   });
}
```

Now lets use the `onNewRow` event to set the default for order id
Let's extend that to also set the default for quantity to 1. We'll change the arrow function to be a multi line one.

```csdiff
orderDetailsGrid = new radweb.GridSettings(new models.Order_details(),
    {
      allowUpdate: true,
      allowDelete: true,
      allowInsert: true,
+     onNewRow: orderDetail => {
+       orderDetail.orderID.value = this.ordersGrid.currentRow.id.value;
+       orderDetail.quantity.value = 1;
+     }
    });
```