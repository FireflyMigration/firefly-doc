﻿
1. Limit the number of rows
```csdiff
@Injectable()
export class AppComponent {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true,
+           get: {
+               limit: 5
+           }
        });

}
```
2. Filter on First Value
```csdiff
@Injectable()
export class AppComponent {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true,
            get: {
                limit: 5,
+               isEqualTo: {
+                   shipVia: 2
+               },
            }

        });

}
``` 
3. Filtering on second value
```csdiff
@Injectable()
export class AppComponent {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
+                   customerID:"HANAR"
                }
            }

        });

}
```
4. IsGreaterOrEqualTo
```csdiff
@Injectable()
export class AppComponent {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
                    customerID:"HANAR"
                },
+               isGreaterOrEqualTo: {
+                   orderDate:"1997-01-01"
+               }

            }

        });

}
```
5. Order By
```csdiff
@Injectable()
export class AppComponent {

    title = 'Orders';
    orders = new utils.DataSettings<models.order>(
        {
            restUrl: apiUrl + 'orders',
            columnKeys: ["id", "customerID", "orderDate", "shipVia"],
            allowUpdate: true,
            get: {
                limit: 5,
                isEqualTo: {
                    shipVia: 2,
                    customerID:"HANAR"
                },
                isGreaterOrEqualTo: {
                    orderDate:"1997-01-01"
                },
+               orderBy:'orderDate'
            }

        });

}
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/5181b5c93111a3819b280cd3bf9d39b875ae2dbb)

<iframe width="560" height="315" src="https://www.youtube.com/embed/8dr5Z2LGxro" frameborder="0" allowfullscreen></iframe>
