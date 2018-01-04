keywords: column,real,virtual,parameter
# Columns and Parameters
Name in Migrated Code: **Columns.Add / BindParameter**  
Location in Migrated Class: **InitializeDataView / Run method**  

![](Columns.png)

## Columns example:
```csdiff
readonly TextColumn OkButton = new TextColumn("Ok Button", "10");
```

```csdiff
    void InitializeDataView()
        {
            From = Products;
            OrderBy = Products.SortByPK_Products;
            #region Column Selection
            Columns.Add(pi_ProdID);
            
+           Columns.Add(Products.ProductID);
            Columns.Add(Products.ProductName);
            Columns.Add(Products.UnitPrice);
            
+            Columns.Add(OkButton).BindValue(() => "Ok");
            MarkParameterColumns(pi_ProdID);
            #endregion
        }
```

1) Column (Real) - Columns.Add(**Products.ProductID**); notice that the column is based on ProductID column from the Products table
2) Local Column (Virtual) - Columns.Add(**OkButton**) - Since this is not a database column it is declared above the constructor inside the Columns #region

## Parameter example:
```csdiff
    public void Run(NumberParameter ppi_ProdID = null)
        {
          + BindParameter(pi_ProdID, ppi_ProdID);
            Execute();
        }
```

3) Parameter - **BindParameter(pi_ProdID, ppi_ProdID);**

The parameter is received via the *Run* method where a variable with the same type is declared (ppi_ProdID)

---
**See Also:**
* [ColumnBase Class](http://www.fireflymigration.com/reference/html/T_Firefly_Box_Data_Advanced_ColumnBase.htm)
* [Local Columns and BindValue](http://doc.fireflymigration.com/local-columns-and-bindvalue.html)
* [Parameters](http://doc.fireflymigration.com/parameters.html)

---