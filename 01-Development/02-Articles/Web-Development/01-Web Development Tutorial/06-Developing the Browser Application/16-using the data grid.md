
```csdiff
@Component({
    template: `
    <h1>{{ title }} ({{title.length}})</h1>
-   <ul>
-       <li *ngFor="let o of orders">
-           Order: {{o.id}}<br/>
-           Customer: {{o.customerID}}
-       </li>
-   </ul>
+   <data-grid [settings]="orders"></data-grid>
`
})

@Injectable()
export class Orders {

    title = 'Orders';
-   orders = new utils.RestList<models.order>(apiUrl + 'orders');
+   orders = new utils.DataSettings<models.order>({ restUrl: apiUrl + 'orders' });
    
-   click() {
-       this.title += "button was clicked";
-       this.orders.get();
-   }
}
const apiUrl = '/dataApi/';
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/dcfd9d00930cc5ec5eb0e230958af47bdb51ee33)


<iframe width="560" height="315" src="https://www.youtube.com/embed/jBkYZmJa1oQ?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
