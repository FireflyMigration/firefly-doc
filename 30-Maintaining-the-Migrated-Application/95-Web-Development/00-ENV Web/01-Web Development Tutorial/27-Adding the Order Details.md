`src/app/app.component.ts`
```csdiff
shippers = new models.shippers();
+orderDetails = new models.orderDetails();
orders = new models.orders(
    {
        numOfColumnsInGrid: 4,
        get: { limit:4 },

}
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
          <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
          <div class="tab-pane active" id="shipInfo">
              <data-area [settings]="shipInfoArea"></data-area>
          </div>
          <div  class="tab-pane" id="tab2">
-             Tab 2 Info
+             <data-grid [settings]="orderDetails"></data-grid>
          </div>
      </div>
  </div>
```

### Fix the Tab Name
`src/app/app.component.html`
```csdiff
  <h1>Orders</h1>
  <data-grid [settings]="orders"></data-grid>
  <select-popup [settings]="customers"></select-popup>
  <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#shipInfo" data-toggle="tab">Ship Info</a></li>
-         <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
+         <li><a href="#orderDetailsTab" data-toggle="tab">Order Details</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
          <div class="tab-pane active" id="shipInfo">
              <data-area [settings]="shipInfoArea"></data-area>
          </div>
-         <div  class="tab-pane" id="tab2">
+         <div  class="tab-pane" id="orderDetailsTab">
              <data-grid [settings]="orderDetails"></data-grid>
          </div>
      </div>
  </div>
```
![Order Details](Order-details.png)