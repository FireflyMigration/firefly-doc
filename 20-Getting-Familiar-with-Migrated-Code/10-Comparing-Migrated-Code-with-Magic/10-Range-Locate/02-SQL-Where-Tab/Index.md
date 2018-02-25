keywords: task properties, range, locate, SQL where, expression, DB SQL
# SQL Where
Name in Migrated Code: **Where.Add**  
Location in Migrated Code: **InitializeDataView**  

![2018 02 25 11H44 03](2018-02-25_11h44_03.jpg)

## Expression / DB SQL

By deafult this screen shows the summary of the ranges as they were defined in the Data View part.
In the migrated code this is represented by the ```Where.Add```

The next items descirbe the expression and DB SQL.

```csdiff
void InitializeDataView()
    {
        From = Order;
        Where.Add(Orders.OrderID.IsBetween(1,5));
```

>More samples of Where are found [here](http://doc.fireflymigration.com/other-types-of-where.html)


