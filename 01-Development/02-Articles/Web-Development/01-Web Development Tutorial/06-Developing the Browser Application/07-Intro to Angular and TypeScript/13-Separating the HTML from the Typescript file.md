
```csdiff
import * as models from './models';

@Component({
+   templateUrl:'./scripts/app/orders.html'
-    template: `
-<h1>{{ title }} ({{title.length}})</h1>
-<input [(ngModel)]="title">
-<h2 *ngIf="title.length>15"> the title is long!!!</h2>
-<button (click)="click()">my button</button>
-<br/>
-<ul>
-<li *ngFor="let o of orders">
-Order: {{o.orderId}}<br/>
-Customer: {{o.customerId}}
-</li>
-</ul>
`
})

@Injectable()
export class Orders {

    title = 'Orders';
    orders = [{
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/5c957b23d15449edb80505d9ffec0cf78ba5b5b3?diff=split)



<iframe width="560" height="315" src="https://www.youtube.com/embed/OdydObGxdDs?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
