1. Goto the `Scripts\App` folder
2. Add new item and use the `Angular2Component` template found in the `ENV.Web` folder. Call it `Orders.ts`

```csdiff
import { Component } from '@angular/core';
import * as utils from './lib/utils';
import * as models from './models';

@Component({
    template:`
 <h1>Orders</h1>
`
})
export class Orders  {

}
```
3. Goto `Scripts\App\app.module.ts` and register the new component:

```csdiff
...
import { RouterModule, Routes } from '@angular/router';
import { Categories } from './Categories';
+import { Orders } from './Orders';



var app = new utils.AppHelper();
app.Register(Categories);
+app.Register(Orders);

...
```

Open the Browser and you'll see a new Orders menu entry, click it and see the Orders component.
![2017 10 13 08H16 07](../2017-10-13_08h16_07.gif)