
Simply download the [EasySql](https://raw.githubusercontent.com/FireflyMigration/EasySql/master/ENV/Utilities/EasySql.cs) file and add it to the `ENV` project under tyhe `Utilities` folder.


## For ENV versions >17000
You'll also need to make the following changes to older versions of the `DynamicSQLEntity` class - with regards to it's constructor
```csdiff
...
public IEntityDataProvider DataProvider
{
    get { return _originalProvider; }
}
-ISQLBuilder _sqlBuilder;
+ISQLBuilder _sqlBuilder
+{
+    get
+    {
+        if (__theBuilder == null)
+            __theBuilder = _sqlBuilderFactory();
+        return __theBuilder;
+    }
+}
+Func<ISQLBuilder> _sqlBuilderFactory;
+ISQLBuilder __theBuilder;
+	public DynamicSQLEntity(DynamicSQLSupportingDataProvider dataProvider, Func<string> sql)
+    : this(dataProvider, "dynamicSql")
+{
+    _sqlBuilderFactory = () => DynamicSQLSupportingDataProvider.ExecutionStrategy.GetSQLBuilder(sql());
+}
public DynamicSQLEntity(DynamicSQLSupportingDataProvider dataProvider, string sql)
    : base(sql, sql, dataProvider.ProvideDynamicSqlEntityDataProvider())
{
    _originalProvider = dataProvider;
-   _sqlBuilder = DynamicSQLSupportingDataProvider.ExecutionStrategy.GetSQLBuilder(sql) ;
+   _sqlBuilderFactory = () => DynamicSQLSupportingDataProvider.ExecutionStrategy.GetSQLBuilder(sql);
    TrimTextColumnParameterValues = DefaultTrimTextColumnParameterValues;
    TrimExpressionParameterValues = TrimExpressionValuesDefault;
    RemoveTextAfterSemicolon = RemoveTextAfterSemicolonDefault;
}
public static bool OemTextParameters { get; set; }
...
```

## For ENV version <17000
There are a few relevant changes.
First, in the `EasySql` class there are several lines that will not build - but there should be a comment next to it with the correct line for the older ENV version.

In the `DynamicSQLEntity` class do the following changes:
```csdiff
public IEntityDataProvider DataProvider
{
    get { return _originalProvider; }
}
+Func<string> _buildSql;
+public DynamicSQLEntity(DynamicSQLSupportingDataProvider dataProvider, Func<string> sql)
 : this(dataProvider, "dynamicSql")
+{
+    _buildSql= sql;
+}
public DynamicSQLEntity(DynamicSQLSupportingDataProvider dataProvider, string sql)
    : base(sql, sql, dataProvider.ProvideDynamicSqlEntityDataProvider())
{
    _originalProvider = dataProvider;
-   _sql = sql;
+   _buildSql = ()=>sql;
}

.... and later down the same file
 internal string GetCompletedSQL(Func<IDbDataParameter> createDbParameter)
{
    string prevSql = _sql;
+   _sql = _buildSql();
    try
    {
        _paramNumber = 0;
        foreach (var action in _prepareSql)
        {
            action(createDbParameter);
        }
        return _sql;
    }
    finally
    {
        _sql = prevSql;
    }
}
```


## If you are having trouble with ENV, let us know
If you have an even older version of dynamic sql entity and would require help, let us know - we'll be happy to help.
