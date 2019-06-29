`src/app/home/home.component.ts`
```csdiff
export class AppComponent {
...
  shipInfoArea = this.ordersGrid.addArea({
    numberOfColumnAreas:2,
    columnSettings: orders => [
      orders.requiredDate,
      orders.shippedDate,
      orders.shipAddress,
      orders.shipCity
    ]
  });
+ orderDetailsGrid = new radweb.GridSettings(new models.Order_details());
}
```
`src/app/home/home.component.html`
```csdiff
  <h1>Orders</h1>
  <data-grid [settings]="ordersGrid"></data-grid>
  <select-popup [settings]="selectCustomerGrid"></select-popup>
  <tabset>
    <tab heading='Ship Info'>
      <data-area [settings]="shipInfoArea"></data-area>
    </tab>
-   <tab heading='Tab 2'>
-     Tab 2 content
+   <tab heading='Order Details'>
+     <data-grid [settings]="orderDetailsGrid"></data-grid>
    </tab>
  </tabset>
```


![Order Details](Order-details.png)