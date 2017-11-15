Add to the `SQLHelper` class, a method that based on a parameter will return a memory database, or a real database.
```csdiff
+public static IEntityDataProvider GetMemoryOrReal(bool useMemory)
+{
+    if (useMemory)
+        return ENV.Data.DataProvider.MemoryDatabase.Instance;
+    else
+        return Shared.DataSources.Northwind1;
+}
```

In the `CategorySales` entity class constructor use the `GetMemoryOrReal` method from the `SQLHelper` class
```csdiff
public readonly Types.Amount Nov = new Types.Amount { Caption = "Nov", Name = "Nov" };
public readonly Types.Amount Dec = new Types.Amount { Caption = "Dec", Name = "Dec" };
#endregion
#region Indexes
/// <summary>By Year and Category (#1)</summary>
public readonly Index SortByYearAndCategory = new Index { Caption = "By Year and Category", Name = "By_Year_and_Prod", AutoCreate = true, Unique = true };
#endregion
-public CategorySales() : base("CategorySales", Northwind.Shared.DataSources.Northwind1)
+public CategorySales(bool useMemory) : base("CategorySales", SQLHelper.GetMemoryOrReal(useMemory))
{
    AutoCreateTable = true;
    InitializeIndexes();
}
+public CategorySales() : this(false)
+{
+}
void InitializeIndexes()
{
    SortByYearAndCategory.Add(Year, CategoryID);
}
```

Add a method that copies data from one Entity to another to the `SQLHelper` class
```csdiff
+public static void CopyData(Entity sourceTable,Entity targetTable)
+{
+    var bp = new BusinessProcess { From = sourceTable };
+    bp.Relations.Add(targetTable, RelationType.Insert);
+    bp.ForEachRow(() => {
+        foreach (var column in targetTable.Columns)
+        {
+            if (!column.DbReadOnly)
+            {
+                column.Value = sourceTable.Columns[column.Name];
+            }
+        }
+    });
+}
```


## In the `CollectOrderDetails` Controller Class
Change the `CategorySales` member to use the InMemory database
```csdiff
#region Models
readonly Models.Order_Details Order_Details = new Models.Order_Details { AllowRowLocking = true };
readonly Models.Products Products = new Models.Products { AllowRowLocking = true,Cached = true };
readonly Models.Orders Orders = new Models.Orders { ReadOnly = true };
readonly Models.ExchangeRates ExchangeRates = new Models.ExchangeRates { ReadOnly = true };
-readonly Models.CategorySales CategorySales = new Models.CategorySales { AllowRowLocking = true };
+readonly Models.CategorySales CategorySales = new Models.CategorySales(true) { AllowRowLocking = true };
#endregion
            
```

In the run method, delete the memory table before the `Execute` and call the `CopyData` method after the `Execute`

```csdiff
/// <summary>Collect Order Details(P#13.2)</summary>
internal void Run()
{
+   if (CategorySales.Exists())
+       CategorySales.Drop();
    Execute();
+   SQLHelper.CopyData(CategorySales, new Models.CategorySales());
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/SHGamJfJhXY?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>