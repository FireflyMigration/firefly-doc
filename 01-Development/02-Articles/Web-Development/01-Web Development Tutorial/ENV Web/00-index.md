.
# This is the second ENV.Web demo
In this demo we'll create a fully updateable master detail screen, for orders and order details with selection lists and everything around it.

Let's start:

# Creating the Server Api's

in the 'Controllers\DataApiController.cs', will add an api for `Orders`, `OrderDetails`, `Customers`, `Shippers` and `Products`:
```csdiff
public class DataApiController : Controller
{
    static DataApi _dataApi = new DataApi();
    static DataApiController()
    {
        _dataApi.Register(typeof(Northwind.Models.Categories),true);
+       _dataApi.Register(typeof(Northwind.Models.Orders));
+       _dataApi.Register(typeof(Northwind.Models.Order_Details));
+       _dataApi.Register(typeof(Northwind.Models.Customers));
+       _dataApi.Register(typeof(Northwind.Models.Shippers));
+       _dataApi.Register(typeof(Northwind.Models.Products));
    }
    // GET: DataApi
    public void Index(string name, string id = null)
    {
        _dataApi.ProcessRequest(name, id);
    }
}
```

### Build and go to the browser, under `dataApi/` we'll see all the added apis.
![2017 10 13 08H07 25](../2017-10-13_08h07_25.gif)
### Let's rename the `order_details` api to `orderDetails`:
```csdiff
_dataApi.Register(typeof(Northwind.Models.Categories),true);
_dataApi.Register(typeof(Northwind.Models.Orders));
-_dataApi.Register(typeof(Northwind.Models.Order_Details));
+_dataApi.Register("orderDetails",typeof(Northwind.Models.Order_Details));
_dataApi.Register(typeof(Northwind.Models.Customers));
_dataApi.Register(typeof(Northwind.Models.Shippers));

```

# Creating the client side
## Add a new angular component to the applciation
1. Goto the `Scripts\App` folder
2. Add new item and use the `Angular2Component` template found in the `ENV.Web` folder. Call it `Orders.ts`

```csdiff
import { Component } from '@angular/core';
import * as utils from './lib/utils';
import * as models from './models';

@Component({
    template:`
<h1>Orders</h1>
`
})
export class Orders  {

}
```
3. Goto `Scripts\App\app.module.ts` and register the new component:

```csdiff
...
import { RouterModule, Routes } from '@angular/router';
import { Categories } from './Categories';
+import { Orders } from './Orders';



var app = new utils.AppHelper();
app.Register(Categories);
+app.Register(Orders);

...
```

Open the Browser and you'll see a new Orders menu entry, click it and see the Orders component.
![2017 10 13 08H16 07](../2017-10-13_08h16_07.gif)

## Getting the rest api definitions to the client typescript code
Go to the `dataApi` help page and copy the TypeScript interfaces and classes for each api into the `Scripts\App\models.ts' file.
*Do it for all the apis we need, `orders`, `orderDetails`, `customers`, `shippers` and `products`*
![2017 10 13 08H19 37](../2017-10-13_08h19_37.gif)

`Scripts\App\models.ts`
```csdiff
import * as utils from './lib/utils';
export class categories extends utils.DataSettings<category>{
    constructor(settings?: utils.IDataSettings<category>) {
        super('/dataapi/categories', settings);
    }
}
export interface category {
    id?: number;
    categoryName?: string;
    description?: string;
}
+export class orders extends utils.DataSettings<order>{
+    constructor(settings?: utils.IDataSettings<order>) {
+        super('/dataapi/orders', settings);
+    }
+}
+export interface order {
+    id?: number;
+    customerID?: string;
+    employeeID?: number;
+    orderDate?: string;
+    requiredDate?: string;
+    shippedDate?: string;
+    shipVia?: number;
+    freight?: number;
+    shipName?: string;
+    shipAddress?: string;
+    shipCity?: string;
+    shipRegion?: string;
+    shipPostalCode?: string;
+    shipCountry?: string;
+}
+export class orderDetails extends utils.DataSettings<orderDetail>{
+    constructor(settings?: utils.IDataSettings<orderDetail>) {
+        super('/dataapi/orderDetails', settings);
+    }
+}
+export interface orderDetail {
+    orderID?: number;
+    productID?: number;
+    unitPrice?: number;
+    quantity?: number;
+    discount?: number;
+    id?: string;
+}
+export class customers extends utils.DataSettings<customer>{
+    constructor(settings?: utils.IDataSettings<customer>) {
+        super('/dataapi/customers', settings);
+    }
+}
+export interface customer {
+    id?: string;
+    companyName?: string;
+    contactName?: string;
+    contactTitle?: string;
+    address?: string;
+    city?: string;
+    region?: string;
+    postalCode?: string;
+    country?: string;
+    phone?: string;
+    fax?: string;
+}
+export class shippers extends utils.DataSettings<shipper>{
+    constructor(settings?: utils.IDataSettings<shipper>) {
+        super('/dataapi/shippers', settings);
+    }
+}
+export interface shipper {
+    id?: number;
+    companyName?: string;
+    phone?: string;
+}
+export class products extends utils.DataSettings<product>{
+    constructor(settings?: utils.IDataSettings<product>) {
+        super('/dataapi/products', settings);
+    }
+}
+export interface product {
+    id?: number;
+    productName?: string;
+    supplierID?: number;
+    categoryID?: number;
+    quantityPerUnit?: string;
+    unitPrice?: number;
+    unitsInStock?: number;
+    unitsOnOrder?: number;
+    reorderLevel?: number;
+    discontinued?: boolean;
+}
```

## Display all the Orders on a data-grid
`Scripts\App\Orders.ts` 

```csdiff
import { Component } from '@angular/core';
import * as utils from './lib/utils';
import * as models from './models';

@Component({
    template:`
  <h1>Orders</h1>
+ <data-grid [settings]="orders"></data-grid>
`
})
export class Orders  {
+   orders = new models.orders();
}
```

Here is the result:
![2017 10 13 08H29 23](../2017-10-13_08h29_23.png)

By default the grid will display the first 5 columns on a grid, and all other columns below the grid in a `data-area`

The grid is fully functional and the user can Sort, filter and page through the data, it can display millions of rows affectively as it only downloads the rows it needs to the browser.

### Grid functionality demo
![2017 10 13 08H32 41](../2017-10-13_08h32_41.gif)

## Design the View
You can visually design the view by adding `?design=y` to the url and then copy the result `typescript` code into the orders class.
![2017 10 13 08H38 37](../2017-10-13_08h38_37.gif)
We'll make the following changes:
1.  Rename `id` column to be `Order Id` and make it `readonly`
2.  Change the `orderDate` column to be of input type `date`
3.  Remove the `EmployeeID` column

We'll copy the code into our typescript code and run it.
It should look like this:
`Scripts\App\Orders.ts`

```csdiff
export class Orders  {
    orders = new models.orders(
+       {
+           columnSettings: [
+               { key: "id", caption: "Order ID", readonly: true },
+               { key: "customerID" },
+               { key: "orderDate", inputType: "date" },
+               { key: "requiredDate" },
+               { key: "shippedDate" },
+               { key: "shipVia" },
+               { key: "freight" },
+               { key: "shipName" },
+               { key: "shipAddress" },
+               { key: "shipCity" },
+               { key: "shipRegion" },
+               { key: "shipPostalCode" },
+               { key: "shipCountry" },
+           ]
+       }
+   );
}

```
![2017 10 13 08H47 16](../2017-10-13_08h47_16.png)

### let's make some more changes:
1. We'll use the `numOfColumnsInGrid` setting to only show 4 columns
2. We'll move `shipVia` to be the 3rd column
3. we'll remove columns that we don't need (you can do it in the designer or the code)
```csdiff
export class Orders  {
    orders = new models.orders(
        {
+           numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                { key: "customerID" },
                { key: "orderDate", inputType: "date" },
+               { key: "shipVia" },
                { key: "requiredDate" },
                { key: "shippedDate" },
-               { key: "shipVia" },
-               { key: "freight" },
-               { key: "shipName" },
                { key: "shipAddress" },
                { key: "shipCity" },
-               { key: "shipRegion" },
-               { key: "shipPostalCode" },
-               { key: "shipCountry" },
            ]
        }
    );
}

```
4. We'll also change the `requiredDate` and `shippedDate` to be of type `date`
```csdiff
export class Orders  {
    orders = new models.orders(
        {
            numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                { key: "customerID" },
                { key: "orderDate", inputType: "date" },
                { key: "shipVia" },
-               { key: "requiredDate" },
+               { key: "requiredDate", inputType:"date" },
-               { key: "shippedDate" },
+               { key: "shippedDate" , inputType:"date" },
                { key: "shipAddress" },
                { key: "shipCity" },
            ]
        }
    );
}
```
It should now look like this:
![2017 10 13 08H53 10](../2017-10-13_08h53_10.png)
## Let's get the customer Name
Add the customers member:
```csdiff
...
export class Orders  {
+   customers = new models.customers();
    orders = new models.orders(
        {
            numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                { key: "customerID" },
...
```

Get the value from customers:
![2017 10 13 09H08 32](../2017-10-13_09h08_32.gif)
1. we set the `getValue` of the `customerID` column with an `Arrow Function`.
2. This function receives a parameter of type `order`, the order for which we want to find the customer.
3. We then call the `lookup.get` function, and search for a customer who's `id` equals the `customerID` or the current `order` (we can filter on any column)
4. Then we return the `companyName` column.
Note how we have intellisense in every step of the way - that's `TypeScript`

```csdiff
...
export class Orders  {
    customers = new models.customers();
    orders = new models.orders(
        {
            numOfColumnsInGrid:4,
            columnSettings: [
                { key: "id", caption: "Order ID", readonly: true },
                {
                    key: "customerID",
+                   getValue: o =>
+                       this.customers.lookup.get({ id: o.customerID }).companyName
                },
                { key: "orderDate", inputType: "date" },
                { key: "shipVia" },
                { key: "requiredDate", inputType:"date" },
                { key: "shippedDate" , inputType:"date" },
                { key: "shipAddress" },
                { key: "shipCity" },
            ]
        }
    );
}
...
```

Here is the result:
![2017 10 13 09H06 36](../2017-10-13_09h06_36.png)
