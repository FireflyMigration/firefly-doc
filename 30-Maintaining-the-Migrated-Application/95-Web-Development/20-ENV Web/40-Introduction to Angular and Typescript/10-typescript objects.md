
```csdiff
@Component({
    template:`
 <h1>{{ title }} ({{title.length}})</h1>
 <input [(ngModel)]="title">
 <h2 *ngIf="title.length>15"> the title is long!!!</h2>
 <button (click)="click()">my button</button>
 <br/>
-Order: {{orderId}}<br/>
+Order: {{order.orderId}}<br/>
-Customer: {{customerId}}
+Customer: {{order.customerId}}

`
})

@Injectable()
export class AppComponent {
  
    title = 'Orders';
-   orderId = 5;
-   customerId = "abc";
+   order = {
+       orderId: 5,
+       customerId: "abc"
+   };
   
    click() {
        this.title += "button was clicked";
    }
}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/23ead88ba0c980a2e508bbd3d6e3d1cda3d6d753)

<iframe width="560" height="315" src="https://www.youtube.com/embed/i_1aRSjggFw?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
