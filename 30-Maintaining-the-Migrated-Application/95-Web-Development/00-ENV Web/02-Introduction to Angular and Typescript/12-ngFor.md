
```csdiff
@Component({
    template: `
    <h1>{{ title }} ({{title.length}})</h1>
    <input [(ngModel)]="title">
    <h2 *ngIf="title.length>15"> the title is long!!!</h2>
    <button (click)="click()">my button</button>
    <br/>
    <ul>
-   <li>
+   <li *ngFor="let o of orders">
-       Order: {{orders[0].orderId}}<br/>
+       Order: {{o.orderId}}<br/>
-       Customer: {{orders[0].customerId}}
+       Customer: {{o.customerId}}
    </li>
    </ul>
`
})
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/4fe142d14f454191fe0d7b8744da64a47969740e)

<iframe width="560" height="315" src="https://www.youtube.com/embed/MhB8J5m2V7k?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
