```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
+   orders = new utils.RestList<models.order>(apiUrl + 'orders');
-   orders: models.order[]= [{
-       id: 5,
-       customerID: "abc"
-   },
-       {
-           id: 6,
-           customerID: "xyz"
-       },
-      ...
-   ];
  click() {
        this.title += "button was clicked";
+       this.orders.get();
    }    

```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/b1b6279579f75a5a402d16e82c470d088e5a4a19)



<iframe width="560" height="315" src="https://www.youtube.com/embed/OVBWDwff0Ec?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
