# Replace Inner Classes With Entity Method
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/usn69wc8AhQ?list=PL1DEQjXG2xnIJdh5U16PWRHKJBc5qEmRb" frameborder="0" allowfullscreen></iframe>

---
The Entity class has many useful methods which you can use in new code, or when refactoring existing code. Some of the methods achieve in a few lines of code the same result as what used to be an entire task in Magic.

## Count Rows
The CountRows methods returns the number of rows in a table. The method also accepts a filter.

**Examples**

Return the number of products:
```csdiff
public long CountProducts()
{
    return new Models.Products().CountRows();
}
```
Return the number of products in the first category (Beverages):
```csdiff
public long CountBeveragesProducts()
{
    var products = new Models.Products();
    return products.CountRows(products.CategoryID.IsEqualTo(1));
}
```
## Sum
The Sum method returns the sum of a specific column of the table. The method also accepts a filter.

**Examples**


Return the sum of all units in stock:
```csdiff
public long SumUnitsInStock()
{
    var products = new Models.Products();
    return products.Sum(products.UnitsInStock);
}
```
Return the Sum units in stock of all beverages:
```csdiff
public long SumBeveragesUnitsInStock()
{
    var products = new Models.Products();
    return products.Sum(products.UnitsInStock, products.CategoryID.IsEqualTo(1));
}
```
## Max
The Max method returns the maximum value of a specific column of the table. The method also accepts a filter.

**Examples**

Return the highest unit price of all products:
```csdiff
public Number GetHighestPrice()
{
    var products = new Models.Products();
    return products.Max(products.UnitPrice);
}
```

Return the highest unit price of all the beverages products:
```csdiff
public Number GetHighestBeveragePrice()
{
    var products = new Models.Products();
    return products.Max(products.UnitPrice, products.CategoryID.IsEqualTo(1));
}
```

## Min
The Min method returns the minimum value of a specific column of the table. The method also accepts a filter.

**Examples**

Return the lowest unit price of all products:
```csdiff
public Number GetLowestPrice()
{
    var products = new Models.Products();
    return products.Min(products.UnitPrice);
}
```

Return the lowest unit price which is not zero:
```csdiff
public Number GetLowestPrice()
{
    var products = new Models.Products();
    return products.Min(products.UnitPrice, products.UnitPrice.IsGreaterThan(0));
}
```

## Contains
The Contains method return true if the tables contains at least one row that match the filter parameter.

**Example**

Return true if there is a product in the products table where the units in stock is less or equal the reorder level:
```csdiff
public bool ShouldReorderStock()
{
    var products = new Models.Products();
    return products.Contains(products.UnitsInStock.IsLessOrEqualTo(products.ReorderLevel));
}
```

## GetValue
The GetValue method gets the value of a specific column of the table, based on a filter expression. It can substitute a Find relation in your programs.
If more than one row match the filter, the first value is returned (same behavior as Find relation). That is why the method also accepts a sort.
One of the most useful usage of this method is when it is added to an ID type in the application, in order to get it's description, wherever the type is used in the application.

**Examples**

Get the name of the product with id 1:
```csdiff
public Text GetProductName()
{
    var products = new Models.Products();
    return products.GetValue(products.ProductName, products.ProductID.IsEqualTo(1));
}
```

## Insert
The Insert method is used to insert a new row to a table. It can substitute an Insert relation or a task with Insert activity.

**Example**

Insert a new product:
```csdiff
public void InsertNewProduct()
{
    var products = new Models.Products();
    products.Insert(() =>
    {
        products.ProductID.Value = 99;
        products.ProductName.Value = "New Product";
        products.UnitPrice.Value = 99.99;
    });
}
```

## InsertIfNotFound
The InsertIfNotFound methods works the same as an InsertIfNotFound relation. It inserts a new row to a table only if the row does not exists already.

**Example**
 
Insert a new product if such a product does not exists:
```csdiff
public void InsertNewProductIfNotExits()
{
    var products = new Models.Products();
    products.InsertIfNotFound(products.ProductID.IsEqualTo(99), () =>
    {
        products.ProductID.Value = 99;
        products.ProductName.Value = "New Product";
        products.UnitPrice.Value = 99.99;
    });
}
```

## ForEachRow
The ForEachRow method iterates on all rows of the table and let you add logic code that will be executed for each row. The method also accepts filter and sort.

**Example**

Update all prices by 10 percent:
```csdiff
public void UpdatePricesBy10Percent()
{
    var products = new Models.Products();
    products.ForEachRow(() =>
    {
        products.UnitPrice.Value *= 1.1;
    });
}
```

Iterate all orders of a customer:
```csdiff
var o = new Models.Orders();
o.ForEachRow(o.CustomerID.IsEqualTo("ALFKI"), new Sort(o.OrderDate), () =>
{
    // dosomething
});
```


## Update
The Update method updates any row of the table that match the filter parameter.

**Example**

Update all beverages prices by 10 percent:
```csdiff
var products = new Models.Products();
                products.Update(products.ProductID.IsEqualTo(1),() =>
                {
                    products.UnitPrice.Value *= 1.1;
                });
```

## Drop
The Drop method drop the table from the database, similar to the DbDel function.

**Example**
```csdiff
public void DropProductsTable()
{
    new Models.Products().Drop();
}
```

## Truncate
The Truncate method removes all rows from the table.

**Example**
```csdiff
public void ClearProductsTable()
{
    new Models.Products().Truncate();
}
```
## Delete
The Delete method is used to delete existing rows from the table that match the filter parameter.

**Example**
```csdiff
public void DeleteAllBeverages()
{
    var products = new Models.Products();
    products.Delete(products.CategoryID.IsEqualTo(1));
}
```
