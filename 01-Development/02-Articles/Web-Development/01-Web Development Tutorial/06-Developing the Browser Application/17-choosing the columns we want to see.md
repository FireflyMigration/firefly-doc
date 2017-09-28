```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
+           columnKeys: ["id", "customerID", "orderDate","shipVia"]
        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/a936667920f1547e861db4d656e4358b95bec5ca)

<iframe width="560" height="315" src="https://www.youtube.com/embed/rgw80PO6zuw?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
