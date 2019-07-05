keywords: columnscollection, columns.add

Sometimes when you develop and use a column you may get the **ColumnNotAddedToColumnCollection** exception, with the following text:
'Column EmployeeID(EmployeeID) from Entity Orders(dbo.Orders) was not added to any controller's ColumnCollection. Did you forget Columns.Add?'

One way to solve this problem is to add the column to the `Columns` collection.

Another approach is to use the `AddAllColumns` method to automatically add all the columns and avoid the potential of this problem altogether.

We recommend using the `AddAllColumns` in most controllers and avoid it only in special cases where it might have a negative effect.



# Why do we need the columns in the Columns Collection in the first place?
The `Columns` collection is responsible for two things:
1. Manage the recompute path of the `BindValue` method and the `Relations`
2. For Columns that belongs to Entities, it gets their data from the database. For example for SQL databases, it'll add the column to the select statement.

# Why doesn't the migrated code call AddAllColumns automatically?
When you developed in magic, you specifically selected which columns are included, and only these columns were included in the select statement.

Initially we automatically used the Add all columns but we ran into the following problems:
1. Some customers had entities that had columns that did not exist in the database and we would get an Invalid Column Name error.
2. Some customers used complex database-views, where adding a column had a significant effect on performance.
3. Some customers had huge tables with hundreds of fields, which caused a small negative effect on performance.

Most of these considerations are not relevant to new code that you write or to 99% of the migrated code, but since in a migration project we need to match the behavior and performance of the original application, we needed to add the columns specifically.

When writing new code - use the `AddAllColumns` - the performance cost is in 99% of cases insignificant. 


# When not to use AddAllColumns?
1. If you have an `Entity` with columns that do not exist in the database.
2. If you have an `Entity` with Columns that are complex inner selects that add significant performance cost.
3. If you have an `Entity` with hundreds of columns, and you experience a performance problem - try removing the add all columns and add the columns manually and see if it has any effect on your code.

# Why sometimes when I forget to add the Column I don't get this error and sometimes I do?
You would only get the **ColumnNotAddedToColumnCollection** exception if you are trying to access the value of a Column that belongs to an Entity and that column was not added to the `Column` collection.

Columns will be automatically added to the columns collection in the following cases:
1. If the column is part of the Primary Key of the Entity
2. If the column is used on the screen.
3. If the column is added through the `GetMandatoryColumns` method in the `Entity` - see the [Entity OnSavingRow](entity-onsavingrow.html) article where we also explain this method.

* Columns that are not connected to an Entity will also work without being added to the Columns collection - but they will not be part of the Recompute.