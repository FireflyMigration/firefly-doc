# Back to the original question

To translate the original question into Northwind terms, let’s say that I would like to count all the Orders of customers who don’t live in “London”.  
Here is the original SQL:
```
select count(*) from Orders where CustomerID not in 
(select CustomerID from Customers where ShipCity='London')
```
Let’s start dirty, and then improve step by step:
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add(
"CustomerID not in 
    (select CustomerID from Customers where City='London')");
return o.CountRows(where);
```
Step 1 - let’s replace the usage of the CustomerID column to a token, so if we ever change it in the Entity, this query will keep working:
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add(
  "{0} not in  
      (select CustomerID from Customers where ShipCity='London')"
      ,o.CustomerID);
return o.CountRows(where);
```
Step 2 – let’s take out the value “London” so that we can receive it as a parameter, and keep it SQL injection free:
```csdiff
var o = new Orders();
var where = new FilterCollection();
where.Add("{0} not in 
  (select CustomerID from Customers where ShipCity={1})"
         ,o.CustomerID,"London");
return o.CountRows(where);
```
Step 3 – let’s use the ‘Customers’ entity name and its column names, instead of writing them in the SQL file itself. This is a bit more tricky. Due to many reasons the method of placing the column as a token, only works on the main entity, which is Orders in our case, so to do that we’ll just insert these values to the SQL string itself. Ironically, this is actually more readable.
```csdiff
var o = new Orders();
var c = new Customers();
var where = new FilterCollection();
where.Add("{0} not in 
   (select "+c.CustomerID.Name+
  " from "+c.EntityName+
  " where "+c.City.Name+"={1})",o.CustomerID,"London");
return o.CountRows(where);
```
Step 4 – let’s refactor it so that we can have an ‘IsNotInSelect” method. First, let’s see the usage:
```csdiff
var o = new Orders();
var c = new Customers();
return o.CountRows(IsNotInSelect(o.CustomerID,c.CustomerID,c.City,”London”));
```
Now let’s see the implementation:
```csdiff
static FilterBase IsNotInSelect
  (ColumnBase col, ColumnBase colInOtherTable,
     TextColumn filterColumn,Text filterValue)
{
    var where = new FilterCollection();
    where.Add("{0} not in 
      (select " + colInOtherTable.Name +
      " from " + colInOtherTable.Entity.EntityName +
      " where " + filterColumn.Name + "={1})", col, filterValue);
    return where;
}
```
Note that we didn’t send the “Customers” entity as a parameter, we simply used the column’s Entity property to figure out the entity that is being used.

This implementation may seem a bit complex, but the beauty of it is that you only do it once – and now you can reuse it all over your code.

Step 5 – Let’s generalize this function further to take care of more complex scenarios with more complex values then “City=’London’”. So I would prefer to send it a filter and use that.

First the usage:
```csdiff
var o = new Orders();
var c = new Customers();
return o.CountRows(IsNotInSelect
(o.CustomerID,c.CustomerID,c.City.IsEqualTo(“London”)));
```
Note that I’m using the IsEqualTo filter, but I can also use any other filter, like the IsIn that we have defined earlier in this post:
```csdiff
var o = new Orders();
var c = new Customers();
return o.CountRows(IsNotInSelect
(o.CustomerID,c.CustomerID,c.City.IsIn("London","Madrid")));
```