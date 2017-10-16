
```csdiff

@Component({
    template: `
 <h1>{{ title }} ({{title.length}})</h1>
 <input [(ngModel)]="title">
 <h2 *ngIf="title.length>15"> the title is long!!!</h2>
 <button (click)="click()">my button</button>
 <br/>
-Order: {{order.orderId}}<br/>
+Order: {{orders[0].orderId}}<br/>
-Customer: {{order.customerId}}
+Customer: {{orders[0].customerId}}
`
})

@Injectable()
export class Orders {

    title = 'Orders';
-   order = {
+   orders = [{
        orderId: 5,
        customerId: "abc"
+   },
+   {
+       orderId: 6,
+       customerId: "xyz"
+   }];
-   };

    click() {
        this.title += "button was clicked";
    }
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/2e4c3cf072b4f505fd011a036b450d0488b0670c)



<iframe width="560" height="315" src="https://www.youtube.com/embed/OHxBS7d9m4Q?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
