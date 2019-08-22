
Simply download the [EasySql](https://raw.githubusercontent.com/FireflyMigration/EasySql/master/ENV/Utilities/EasySql.cs) file and add it to the `ENV` project under tyhe `Utilities` folder.

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

If you have an even older version of dynamic sql entity and would require help, let us know - we'll be happy to help.