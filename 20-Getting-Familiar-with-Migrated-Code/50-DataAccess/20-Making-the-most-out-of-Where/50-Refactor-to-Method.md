# Refactor to Method

So I’ll probably need the “in” function to be used all across my application, so the best way to reuse it is to refactor it. Let’s create a method called “IsIn”.

```csdiff
static FilterCollection IsIn(TextColumn col, Text val1, Text val2)
{
    var where = new FilterCollection();
    where.Add("{0} in ({1},{2})", col, val1, val2);
    return where;
}
```
and use it, as following:
``` csdiff
var o = new Orders();
return o.CountRows(IsIn(o.CustomerID, "TOMSP", "HANAR"));
```
OK, I like the usage, it’s simple enough (will improve it a bit more later), but what if I have more then two values? Let’s change the IsIn function, to support more then two values:
```csdiff
static FilterCollection IsIn(TextColumn col, params Text[] vals)
{
    var where = new FilterCollection();
    var args = new ArrayList();
    args.Add(col);
    int i = 1;
    string inStatement = "{0} in (";

    foreach (var val in vals)
    {
        if (i &gt; 1)
            inStatement += ",";
        inStatement += "{" + i++ + "}";
        args.Add(val);
    }
    inStatement += ")";

    where.Add(inStatement, args.ToArray());
    return where;
}
```
In this code, we simply create the statement and arguments, according to the number of values received in the “vals” parameter.
