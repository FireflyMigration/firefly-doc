# The short answer

If you are just interested in how to do it, here it is.

Add a method called IsNotInSelect:
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
And use it like this:
```csdiff
var o = new Orders();
var c = new Customers();
return o.CountRows(IsNotInSelect(
      o.CustomerID,c.CustomerID,c.City.IsEqualTo("London")));
```
If you are interested in how to get there, keep reading.
