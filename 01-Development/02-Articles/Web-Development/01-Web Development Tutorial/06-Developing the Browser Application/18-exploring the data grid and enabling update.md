```csdiff

@Injectable()
export class Orders {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate","shipVia"],
+           allowUpdate: true 
        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/da18e0fee77ec5bc69a5e0f7a80e6cdbbe1a651e)

<iframe width="560" height="315" src="https://www.youtube.com/embed/8FZgScEJ_Zs?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
