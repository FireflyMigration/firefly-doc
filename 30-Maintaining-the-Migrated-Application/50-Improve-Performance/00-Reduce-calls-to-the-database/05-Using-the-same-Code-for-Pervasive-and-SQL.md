To use the same code for Pervasive and SQL, simply add an if statement to distinguish the different behaviors.

```csdiff
if (ENV.Data.DataProvider.BtrieveMigration.UseBtrieve)
{
    ///code that is relevant for Btrieve
}
else
{
    /// code that is relevant for SQL
}
```
You can use it for the Relation type, based using the inline if syntax `condition?thenValue:elseValue`
```csdiff
 Relations.Add(Orders, 
+   ENV.Data.DataProvider.BtrieveMigration.UseBtrieve ? RelationType.Find : RelationType.OuterJoin, 
    Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);
```

You can use a helper class

```csdiff
+public class SQLHelper
+{
+    public static RelationType OuterJoin() => 
+        ENV.Data.DataProvider.BtrieveMigration.UseBtrieve ? RelationType.Find : RelationType.OuterJoin;
+}
```
And then in the code just call it
```csdiff
 Relations.Add(Orders, 
-   ENV.Data.DataProvider.BtrieveMigration.UseBtrieve ? RelationType.Find : RelationType.OuterJoin, 
+   SQLHelper.OuterJoin(),
    Orders.OrderID.IsEqualTo(Order_Details.OrderID), Orders.SortByPK_Orders);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/g15OmgA0jcU?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>


