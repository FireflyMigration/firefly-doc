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
        {
            caption: "total",
            getValue: o => (o.quantity * o.unitPrice).toLocaleString()
        }
    ],
    onNewRow: od => {
        od.orderID = this.orders.currentRow.id;
        od.quantity = 1;
    }
});
+getOrderTotal() {
+    let result = 0;
+    this.orderDetails.items.forEach(od =>
+        result += od.unitPrice * od.quantity);
+    return result.toFixed(2);
+}
orders = new models.orders(

```

`src/app/app.component.html`
```csdiff
 <h1>Orders</h1>
 <data-grid [settings]="orders"></data-grid>
 <select-popup [settings]="customers"></select-popup>
 <div>
     <!-- Nav tabs -->
     <ul class="nav nav-tabs" role="tablist">
         <li class="active"><a href="#shipInfo" data-toggle="tab">Ship Info</a></li>
         <li>
             <a href="#orderDetailsTab" data-toggle="tab">
-                Order Details
+                Order Details, Total:{{getOrderTotal()}}
             </a>
         </li>
     </ul>
     <!-- Tab panes -->
     <div class="tab-content">
         <div class="tab-pane active" id="shipInfo">
             <data-area [settings]="shipInfoArea"></data-area>
         </div>
         <div class="tab-pane" id="orderDetailsTab">
             <data-grid [settings]="orderDetails" *ngIf="orders.currentRow && orders.currentRow.id"></data-grid>
         </div>
     </div>
 </div>
```
![2017 10 16 06H22 50](2017-10-16_06h22_50.gif)