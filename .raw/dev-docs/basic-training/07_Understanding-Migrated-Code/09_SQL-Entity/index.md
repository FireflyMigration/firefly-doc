### SQL Entity
1.	The best way to access the data from the database is using the entities classes. However, sometimes, we need to write our own SQL, especially if we need to execute a stored procedure or use special SQL functions like Count, Sum etc.
2.	Let’s see a simple `SELECT` example. Create a new UIController "SQLEntityDemo":
```csdiff
public class SQLEntityDemo : UIControllerBase
{
+   public DynamicSQLEntity sqlEntity;

+   public NumberColumn OrderID = new NumberColumn("", "9");
+   public TextColumn ShipName = new TextColumn("", "50");
+   public TextColumn ShipCity = new TextColumn("", "30");

    public SQLEntityDemo()
    {
+        sqlEntity = new DynamicSQLEntity(Models.DataSources.Northwind1,
+            @"SELECT OrderID, ShipName, ShipCity
+              FROM Orders  
+              WHERE ShipCity= ':1'");

+        sqlEntity.Columns.Add(OrderID, ShipName, ShipCity);
+        sqlEntity.AddParameter(() => "London"); //param :1
+        From = sqlEntity;
+        Columns.Add(OrderID, ShipName, ShipCity);
    }
```
3. Note that the order of the `AddParameter` methods is respectively with the parameters indexes in the SQL statement.
4. The need of quotes (' ') is for strings and to any parameter value that is converted to string.
5. Place a grid on the screen with all the local columns.
6. Add Program to the menu
7. Run the program.
8. Add another parameter and run the program:
```csdiff
 public SQLEntityDemo()
{
    sqlEntity = new DynamicSQLEntity(Models.DataSources.Northwind1,
        @"SELECT OrderID, ShipName, ShipCity
            FROM Orders  
-           WHERE ShipCity= ':1'");
+           WHERE ShipCity= ':1' and OrderID= :2 ");

    sqlEntity.Columns.Add(OrderID, ShipName, ShipCity);
    sqlEntity.AddParameter(() => "London"); //param :1
+    sqlEntity.AddParameter(() => 10532); //param :2
    From = sqlEntity;
    Columns.Add(OrderID, ShipName, ShipCity);
}
```
9. Notice that this creates in memory a result set, so the data is **read only**.
10. Make the program read only:
```csdiff
protected override void OnLoad()
{
+   Activity = Activities.Browse;
+   AllowUpdate = false;
    View = () => new Views.SQLEntityDemoView(this);
}
```

11. Exercise: SQL Entity