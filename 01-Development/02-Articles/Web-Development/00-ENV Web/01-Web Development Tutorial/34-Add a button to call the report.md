`Scripts\App\Orders.html`
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
                 Order Details, Total:{{getOrderTotal()}}
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
+    <button class="btn btn-primary" (click)="printCurrentOrder()">Print</button>
 </div>
```
* We use the `btn` and `btn-primary` bootstrap classes to style our button,
* We use the angular '(click)` event registration to call our `printCurrentOrder` on the `Order.ts`
```csdiff
getOrderTotal() {
    let result = 0;
    this.orderDetails.items.forEach(od =>
        result += od.unitPrice * od.quantity);
    return result;
}
+printCurrentOrder() {
+    window.open('home/print/' + this.orders.currentRow.id);
+}
orders = new models.orders(

```
![2017 10 16 06H39 47](2017-10-16_06h39_47.gif)