
```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true
            allowUpdate: true,
+           get: {
+               limit: 5,
+               isEqualTo: {
+                   shipVia: 2,
+                   customerID:"HANAR"
+               },
+               isGreaterOrEqualTo: {
+                   orderDate:"1997-01-01"
+               },
+               orderBy:'orderDate'
+           }

        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/5181b5c93111a3819b280cd3bf9d39b875ae2dbb)

<iframe width="560" height="315" src="https://www.youtube.com/embed/8dr5Z2LGxro?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
