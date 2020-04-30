keywords:identity column,dbreadonly
Sometimes we want to have an automatically generate identity column in the database, and use that as the primary key in the application.

To do that, you'll need to define the `PrimaryKey` attribute with the `identity` property set to `true`.

```csdiff
public class Suppliers : Entity
{
    #region Columns
+   [PrimaryKey(Identity = true)]
    public readonly NumberColumn SupplierID = new NumberColumn("SupplierID", "N10");
    public readonly TextColumn CompanyName = new TextColumn("CompanyName", "40");
    #endregion
```

# Other database generated fields - `DbReadOnly`
Sometimes we want to have a column value determined by the db and never changed by the application (like row create date or an expression)
To do that, you can use the `DbReadOnly` property, that when it's set to true, will only include this column in select statements and not in update or insert statements.

Here's how to use it:
```csdiff
public readonly TextColumn FirstName = new TextColumn();
public readonly TextColumn LastName = new TextColumn();
public readonly TextColumn FullName = new TextColumn() 
{
    Name = "FirstName || ' ' || LastName",
+   DbReadOnly = true 
};
```

