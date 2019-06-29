# Modify the component

`src/app/categories/categories.component.ts`

In the categories.component.ts, please do the following


1) Add imports

```csdiff
import { Component, OnInit } from '@angular/core';
+ import * as models from './../models';
+ import * as radweb from 'radweb';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.css']
})
export class CategoriesComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
```

2) Constructor – you can remove it  - it’s used in angular when you want to receive services. (Router)
3) ngOnInit – a method that is called after the controller is created and before it is displayed – (like onload in migrated code)
   a) If you remove it remember to remove it’s interface usage from the class name (implements OnInit)

```csdiff
import { Component, OnInit } from '@angular/core';
import * as models from './../models';
import * as radweb from 'radweb';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.css']
})
+export class CategoriesComponent {
+
}
```


