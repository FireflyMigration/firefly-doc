* In the `Scripts\App\` folder add a new html file, and call it `Orders.html`
* Delete it's content and move the content of template settings in the TypeScript file to it.

`Scripts\App\Orders.html`
```csdiff
 <h1>Orders</h1>
 <data-grid [settings]="orders"></data-grid>
 <select-popup [settings]="customers"></select-popup>
```

`Scripts\App\Orders.ts`
```csdiff
import { Component } from '@angular/core';
import * as utils from './lib/utils';
import * as models from './models';

@Component({
+    templateUrl:'./scripts/app/orders.html'
-    template: `
-<h1>Orders</h1>
-<data-grid [settings]="orders"></data-grid>
-<select-popup [settings]="customers"></select-popup>
-`
})
export class Orders {
    customers = new models.customers({
        numOfColumnsInGrid:4,
        columnSettings: [
            { key: "id" },
...
```

The result should appear exactly the same - but now we can maintain the html easily using visual studio intellisense and syntax checking (at least for the html)