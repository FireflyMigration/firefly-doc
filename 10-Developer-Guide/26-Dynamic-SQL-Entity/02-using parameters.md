
<iframe width="560" height="315" src="https://www.youtube.com/embed/cOr2gwUg_JU?list=PL1DEQjXG2xnKbJ9yhOVbOitJaBbC1fgZg" frameborder="0" allowfullscreen></iframe>

```csdiff
 public class DemoCustomSQL : UIControllerBase
    {
        public readonly NumberColumn OrderId = new NumberColumn("OrderId","6");
        public readonly TextColumn ShipName = new TextColumn("ShipName","50");
        public readonly TextColumn ShipCity = new TextColumn("ShipCity","50");

        DynamicSQLEntity dynamicSql;
        public DemoCustomSQL()
        {
            dynamicSql = new DynamicSQLEntity(Shared.DataSources.Northwind1, @"
select orderid, shipName, shipcity
  from Orders
+Where ShipCity = ':1'");

            From = dynamicSql;
            dynamicSql.Columns.Add(OrderId, ShipName, ShipCity);
+           dynamicSql.AddParameter(() => "London");//:1
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

Adding another parameter
```csdiff
 public class DemoCustomSQL : UIControllerBase
    {
        public readonly NumberColumn OrderId = new NumberColumn("OrderId","6");
        public readonly TextColumn ShipName = new TextColumn("ShipName","50");
        public readonly TextColumn ShipCity = new TextColumn("ShipCity","50");

        DynamicSQLEntity dynamicSql;
        public DemoCustomSQL()
        {
            dynamicSql = new DynamicSQLEntity(Shared.DataSources.Northwind1, @"
select orderid, shipName, shipcity
  from Orders
 Where ShipCity = ':1'
+  and orderid = :2");

            From = dynamicSql;
            dynamicSql.Columns.Add(OrderId, ShipName, ShipCity);
            dynamicSql.AddParameter(() => "London");//:1
+           dynamicSql.AddParameter(() => 10532);//:2
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