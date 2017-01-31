### Entity.GetValue 
1.	The next method replaces the relation to Products table in ShowOrderDetails. To get the product name we can add the following:
```csdiff
+ Models.Products products = new Models.Products();

+ public Text GetProductName()
+ {
+     
+     return products.GetValue(products.ProductName, products.ProductID.IsEqualTo(OrderDetails.ProductID));
+ }
```  
2. The Entity.GetValue can cache the results:

```
- Models.Products products = new Models.Products();
+ Models.Products products = new Models.Products { Cached = true};

public Text GetProductName()
{
    return products.GetValue(products.ProductName, products.ProductID.IsEqualTo(OrderDetails.ProductID));
}
```
3. Now we can take this method and move it to the ProdId type, so that it will be available to us in any program that uses the productId column:
```csdiff
namespace Northwind.Types
{
    /// <summary>Prod ID(T#3)</summary>
    class ProdID : NumberColumn 
    {
        
        public ProdID():base("Prod ID", "2")
        {
            Expand += () => new Products.ShowProducts().Run(this);
        }
        
+        Models.Products products;
+        public Text GetProductName()
+        {            
+            if (products == null)
+                products = new Models.Products { Cached = true };
+            return products.GetValue(products.ProductName, products.ProductID.IsEqualTo(this));
+        }

    }
}
```