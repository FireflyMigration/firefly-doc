
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
-   orders = [{
+   orders: order[]= [{
        orderId: 5,
        customerId: "abc"
    },
    {
        orderId: 6,
        customerId: "xyz"
    }];

    click() {
        this.title += "button was clicked";
    }
}
+export interface order {
+    orderId?: number;
+    customerId?: string;
+}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/faba13fba6f735d21efbf4ecb1e85ec6ea8ed730)



<iframe width="560" height="315" src="https://www.youtube.com/embed/0Eh0gw0VQ_A?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
