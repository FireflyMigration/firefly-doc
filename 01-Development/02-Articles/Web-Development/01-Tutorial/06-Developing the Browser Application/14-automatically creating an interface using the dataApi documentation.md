Use the dataApi documentation, to get the TypeScript interface based on your DataApi.

We recommend moving that interface to the 'models' file so that you can reuse it in multiple components

```csdiff
@Injectable()
export class Orders {

    title = 'Orders';
-   orders: order[]= [{
+   orders: models.order[]= [{
        id: 5,
        customerID: "abc"
    },
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/f65742b5146233ee66ce8897ef9a5cdb470fa053)




<iframe width="560" height="315" src="https://www.youtube.com/embed/afMO1SKfu1A?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
