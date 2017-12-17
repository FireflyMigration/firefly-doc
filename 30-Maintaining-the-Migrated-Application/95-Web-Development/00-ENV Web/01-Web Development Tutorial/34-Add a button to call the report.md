`src/app/app.component.html`
```csdiff
  <h1>Orders</h1>
  <data-grid [settings]="ordersGrid"></data-grid>
  <select-popup [settings]="selectCustomerGrid"></select-popup>
  <tabset>
    <tab heading='Ship Info'>
      <data-area [settings]="shipInfoArea"></data-area>
    </tab>
    <tab heading='Order Details {{getOrderTotal()}}'>
      <data-grid [settings]="orderDetailsGrid"></data-grid>
    </tab>
  </tabset>
+ <button class="btn btn-primary" (click)="printCurrentOrder()">Print</button>
```
* We use the `btn` and `btn-primary` bootstrap classes to style our button,
* We use the angular '(click)` event registration to call our `printCurrentOrder` on the `Order.ts`
```csdiff
  getOrderTotal() {
    let result = 0;
    this.orderDetailsGrid.items.forEach(
      orderDetail =>
        result += orderDetail.quantity.value * orderDetail.unitPrice.value);
    return result.toFixed(2);
  }
+ printCurrentOrder() {
+   window.open(
+     environment.serverUrl + 'home/print/' + this.ordersGrid.currentRow.id.value);
+ }
}
```
![2017 10 16 06H39 47](2017-10-16_06h39_47.gif)