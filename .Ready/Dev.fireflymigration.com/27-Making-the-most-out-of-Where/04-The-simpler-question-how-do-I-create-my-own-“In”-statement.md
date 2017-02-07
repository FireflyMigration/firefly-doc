# The simpler question, how do I create my own “In” statement?

Let’s say that we would like to count the orders of specific customers.

The basic to it will be:
```csdiff
var o = new Orders();
return o.CountRows(o.CustomerID.IsEqualTo("TOMSP")
       .Or(o.CustomerID.IsEqualTo("HANAR")));
```
We’re using the “CountRows” method, that receives a “FilterBase” object – just like any other filter that is used in the application.

This is a bit cumbersome, and is tolerable when I have two customers, but what if I have more?

Let’s evolve this by creating our own “In” function.

First, instead of sending the “IsEqualTo” filter, directly to the “CountRows” method, let’s use a “FilterCollection”
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add(o.CustomerID.IsEqualTo("TOMSP")
      .Or(o.CustomerID.IsEqualTo("HANAR")));
return o.CountRows(where);
```
Now that we have the filter collection, we can use all of the power of the regular where, that we are used to, and send our own SQL commands to the where:
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add("{0}={1} or {0}={2}", o.CustomerID, "TOMSP", "HANAR");
return o.CountRows(where);
```

Note that the token “{0}” will be replaced by the “Name” of the CustomerID column, and the tokens “{1}” and “{2}” will be replaced by the values “TOMSP” and “HANAR” respectively.

Next let’s use the SQL in statement, instead of the or statement:
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add("{0} in ({1},{2})", o.CustomerID, "TOMSP", "HANAR");
return o.CountRows(where);
```