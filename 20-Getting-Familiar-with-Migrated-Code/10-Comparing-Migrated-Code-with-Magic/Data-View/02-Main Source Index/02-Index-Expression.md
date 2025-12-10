keywords:BindOrderBy
# Index Expression

### For BusinessProcess
Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **OnLoad Method**  

Example :
```csdiff
protected override void OnLoad()
{
    OrderBy = Customers.Indexes[u.If(v_Indicator == 1,
        Category.Indexes.IndexOf(Category.SortByCategoryID), 
        Category.Indexes.IndexOf(Category.SortByCategoryName))];
}
```
 
### For UIController
Name in Migrated Code: **BindOrderBy**  
Location in Migrated Code: **InitializeDataView Method**  

In UIController we use the `BindOrderBy` instead of a simple set to the `OrderBy` because this expression is evaluated during the execution of the UIController in cases of ReloadData and other cases.

Example:
```csdiff
protected override void InitializeDataView()
{
    BindOrderBy(() => Customers.Indexes[u.If(v_Indicator == 1,
        Category.Indexes.IndexOf(Category.SortByCategoryID), 
        Category.Indexes.IndexOf(Category.SortByCategoryName))]);
}
```

## Development post migration
In new code that we'll write after the migration we can write this with much easier syntax.

First - we don't need the index stuff - the `IndexOf` method is backward compatible to '1'Key in magic or the '1'Index in unipaas/xpa.
So this can be written:
```csdiff
protected override void OnLoad()
{
+   OrderBy = u.If(v_Indicator == 1,Category.SortByCategoryID, Category.SortByCategoryName);
}
```

Also - I would much rather use an If statement:
```csdiff
protected override void OnLoad()
{
+   if(v_Indicator == 1)
+       OrderBy = Category.SortByCategoryID; 
+   else
+       OrderBy = Category.SortByCategoryName;
}
```

In some cases - you can also use a `switch` Statement:
```csdiff
protected override void OnLoad()
{
+   switch((int)v_Indicator)
+   {
+       case 1:
+           OrderBy = Category.SortByCategoryID; 
+           break;
+       default:
+           OrderBy = Category.SortByCategoryName;
+           break;
+   }
}
```

### You can also do the same with the `BindOrderBy` method for UIControllers
First - we don't need the index stuff - the `IndexOf` method is backward compatible to '1'Key in magic or the '1'Index in unipaas/xpa.
So this can be written:
```csdiff
protected override void InitializeDataView()
{
+   BindOrderBy(() => u.If(v_Indicator == 1,Category.SortByCategoryID, Category.SortByCategoryName));
}
```

Also - I would much rather use an If statement:
```csdiff
protected override void InitializeDataView()
{
+   BindOrderBy(() => 
+       {
+          if(v_Indicator == 1)
+              return Category.SortByCategoryID; 
+          else
+              return Category.SortByCategoryName;
+       });
}
```

In some cases - you can also use a Switch Statement:
```csdiff
protected override void InitializeDataView()
{
+   BindOrderBy(() => 
+       {
+          switch((int)v_Indicator)
+          {
+              case 1:
+                  return Category.SortByCategoryID; 
+                  break;
+              default:
+                  return Category.SortByCategoryName;
+                  break;
+          }
+       });
}
```







--- 
**See Also:**
* [UIController OrderBy](/reference/html/P_Firefly_Box_UIController_OrderBy.htm)
* [BusinessProcess OrderBy](/reference/html/P_Firefly_Box_BusinessProcess_OrderBy.htm)
---
