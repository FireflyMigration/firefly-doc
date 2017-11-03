`src/app/app.component.ts` 

```csdiff
import { Component } from '@angular/core';
import * as models from './models';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
+   orders = new models.orders();
- title = 'app';
}
```

`src/app/app.component.html` 
```csdiff
+ <h1>Orders</h1>
+ <data-grid [settings]="orders"></data-grid>
```

Here is the result:

![2017 10 13 08H29 23](../2017-10-13_08h29_23.png)

By default the grid will display the first 5 columns on a grid, and all other columns below the grid in a `data-area`

The grid is fully functional and the user can Sort, filter and page through the data, it can display millions of rows affectively as it only downloads the rows it needs to the browser.

### Grid functionality demo
![2017 10 13 08H32 41](../2017-10-13_08h32_41.gif)
