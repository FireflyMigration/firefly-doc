To prevent the SQL Client from adding the `A` alias prefix to our Evaluated SQL Column, we'll prefix the name with the `=` sign
```
V_HasOrderDetails.Name = @"=isnull((
Select max(1)
From dbo.[Order Details] 
Where OrderID = Orders.OrderID
),0)";
```

To refer to the correct OrderID column in the parent query, where Orders table is now referred to as `A` we'll change from 
```
Where OrderID = Orders.OrderID
```
To
```
Where OrderID = A.OrderID
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/hmmFij4AOQo?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>



### If you are using an older version of The migrated code (Before 19/4/2017) You'll need to make the following adjustments to the SQLClient.cs file
Around line 3046, in the constructor of the SQLSelectCommand class
```csdiff
public SQLSelectCommand(Firefly.Box.Data.Entity entity, SQLDataProviderHelper parent, IEnumerable<ColumnBase> selectedColumns, IFilter where, Sort sort, IEnumerable<IJoin> joins, bool disableCache, string entityName)
{
    _entityName = entityName;

    _entity = entity;

    _parent = parent;
    _where = where;
    _sort = sort;
    _columns = selectedColumns;
    _disableCache = disableCache;
-   _getColumnAlias = x => _parent._client.WrapColumnName(x.Name);
+   _getColumnAlias = x =>
+   {
+       if (x.Name[0] == '=')
+           return _parent._client.WrapColumnName(x.Name.Substring(1));
+       return _parent._client.WrapColumnName(x.Name);
+   };
    _getColumnAliasForSelect = _getColumnAlias;
    foreach (var j in joins)
    {

        if (_aliases == null)
        {
            _aliases = new Dictionary<Firefly.Box.Data.Entity, string> { { _entity, "A" } };
-           _getColumnAlias = column => _parent._client.WrapColumnName(_aliases[column.Entity]) + "." + _parent._client.WrapColumnName(column.Name);
+          _getColumnAlias = column =>
+          {
+              if (column.Name[0] == '=')
+                  return _parent._client.WrapColumnName(column.Name.Substring(1));
+              return _parent._client.WrapColumnName(_aliases[column.Entity]) + "." + _parent._client.WrapColumnName(column.Name);
+          };
            _getColumnAliasForSelect =
                column => _parent._client.GetColumnNameForSelect(column, _getColumnAlias(column));
        }
        int i = _aliases.Count;
        int modVal = (int)'Z' - 'A' + 1;
        ...
```
