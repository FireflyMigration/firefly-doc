keywords: DynamicSql, DynamicSqlEntity, Stored Procedure, DirectSQL

1.	The best way to access the data from the database is using the entities classes. However, sometimes, we need to write our own SQL, especially if we need to execute a stored procedure or use special SQL functions like Count, Sum etc.

```csdiff
 public class DemoCustomSQL : UIControllerBase
    {
+       public readonly NumberColumn OrderId = new NumberColumn("OrderId","6");
+       public readonly TextColumn ShipName = new TextColumn("ShipName","50");
+       public readonly TextColumn ShipCity = new TextColumn("ShipCity","50");

+       DynamicSQLEntity dynamicSql;
        public DemoCustomSQL()
        {
+           dynamicSql = new DynamicSQLEntity(Shared.DataSources.Northwind1, @"
+select orderid, shipName, shipcity
+ from Orders");
+           From = dynamicSql;
+           dynamicSql.Columns.Add(OrderId, ShipName, ShipCity);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.DemoCustomSQLView(this);
        }
    }
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/muKY65lzr2g?list=PL1DEQjXG2xnKbJ9yhOVbOitJaBbC1fgZg" frameborder="0" allowfullscreen></iframe>