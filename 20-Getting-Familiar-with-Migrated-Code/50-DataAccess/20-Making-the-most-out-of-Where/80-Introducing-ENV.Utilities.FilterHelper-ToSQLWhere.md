# Introducing ENV.Utilities.FilterHelper.ToSQLWhere

Now for the implementation. Instead of receiving the ‘filterColumn’ and the ‘filterValue’ we’ll recieve a ‘filter’ of type “FilterBase”. All we have to do is to translate that “FilterBase” into proper SQL, using the ENV.Utilities.FilterHelper.ToSQLWhere method.

```csdiff
static FilterBase IsNotInSelect
   (ColumnBase col, ColumnBase colInOtherTable, FilterBase filter)
{
    var where = new FilterCollection();
    var stringFilter = ENV.Utilities.FilterHelper.ToSQLWhere
                          (filter, false, colInOtherTable.Entity);
    where.Add("{0} not in 
             (select " + colInOtherTable.Name + 
            " from " + colInOtherTable.Entity.EntityName + 
            " where " + stringFilter+")",col);
    return where;
}
```
Of course that this also can be refactored to Context and moved to the TextColumn base class or anywhere else you may find it useful.

That’s it, long answer to a short question – but my goal was to share with you some advanced features and refactoring concepts that will empower your development – and the biggest fun – you only do this once and then you can simply reuse it all over your code.