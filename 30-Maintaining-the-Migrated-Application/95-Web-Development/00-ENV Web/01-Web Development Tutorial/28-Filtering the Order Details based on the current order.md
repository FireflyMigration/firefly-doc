We'll use the `onEnterRow` event, that is set to an Arrow Function that receives an  `order` object of the specfic order. We'll use that order to filter the `orderDetails` `orderID` column.
`src/app/app.component.ts`
```csdiff
orderDetails = new models.orderDetails();
orders = new models.orders(
    {
        numOfColumnsInGrid: 4,
        get: { limit: 4 },
+       onEnterRow: o => this.orderDetails.get({ isEqualTo: { orderID: o.id } }),
        allowUpdate: true,
        allowInsert: true,
        allowDelete: true,

```

We'll also only show the order details grid, if an order exists and has an ID
`src/app/app.component.html`
```csdiff
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="shipInfo">
            <data-area [settings]="shipInfoArea"></data-area>
        </div>
        <div  class="tab-pane" id="orderDetailsTab">
-           <data-grid [settings]="orderDetails"></data-grid>
+           <data-grid [settings]="orderDetails" *ngIf="orders.currentRow && orders.currentRow.id"></data-grid>
        </div>
    </div>

```
![2017 10 15 11H01 47](2017-10-15_11h01_47.gif)