Go to the `dataApi` help page and copy the TypeScript interfaces and classes for each api into the `src/app/models.ts` file.
* Do it for all the apis we need, `orders`, `orderDetails`, `customers`, `shippers` and `products`

![2017 10 13 08H19 37](../2017-10-13_08h19_37.gif)

`src/app/models.ts`
```csdiff
import { environment } from './../environments/environment';
import * as radweb from 'radweb';

export class categories extends radweb.DataSettings<category>{
    constructor(settings?: radweb.IDataSettings<category>) {
        super(environment.apiUrl + '/dataapi/categories', settings);
    }
}
export interface category {
    id?: number;
    categoryName?: string;
    description?: string;
}
+export class orders extends radweb.DataSettings<order>{
+    constructor(settings?: radweb.IDataSettings<order>) {
+        super(environment.apiUrl + '/dataapi/orders', settings);
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
+export class orderDetails extends radweb.DataSettings<orderDetail>{
+    constructor(settings?: radweb.IDataSettings<orderDetail>) {
+        super(environment.apiUrl + '/dataapi/orderDetails', settings);
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
+export class customers extends radweb.DataSettings<customer>{
+    constructor(settings?: radweb.IDataSettings<customer>) {
+        super(environment.apiUrl + '/dataapi/customers', settings);
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
+export class shippers extends radweb.DataSettings<shipper>{
+    constructor(settings?: radweb.IDataSettings<shipper>) {
+        super(environment.apiUrl + '/dataapi/shippers', settings);
+    }
+}
+export interface shipper {
+    id?: number;
+    companyName?: string;
+    phone?: string;
+}
+export class products extends radweb.DataSettings<product>{
+    constructor(settings?: radweb.IDataSettings<product>) {
+        super(environment.apiUrl + '/dataapi/products', settings);
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