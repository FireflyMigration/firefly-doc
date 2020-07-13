# Latin1_general_bin collation for MSSQL data migration

Our MSSQL data migration contains 2 parts.

1. Creating the MSSQL database
2. Running the data migration  

In this article we will cover the reason why, when creating the MSSQL database, we use the latin1_general_bin database collation.

Common collation names either end in _BIN or _CI_AS such as Latin1_General_BIN or SQL_Latin1_General_CI_AS.  
The _BIN means that this is a binary sort order where strings will be sorted using a computer binary order, the result is that A-Z are before a-z and things like accented characters will be at the end. The CI_AS ones are case insensitive and will be sorted in dictionary order meaning AaBb… and accented characters are inserted in with their base letter.

Since Pervasive uses a binary sort order, we use the latin1_general_bin collation when creating the MSSQL database.  
If you chose a \_CI_ sort order then since strings are case insensitive, a search for david would return either David, DAVID or david.

Reference
* [https://smist08.wordpress.com/2011/08/13/accpac-and-sql-server/](https://smist08.wordpress.com/2011/08/13/accpac-and-sql-server/)
* [https://msdn.microsoft.com/en-us/library/ms143726%28v=sql.105%29.aspx?f=255&MSPPError=-2147217396](https://msdn.microsoft.com/en-us/library/ms143726%28v=sql.105%29.aspx?f=255&MSPPError=-2147217396)

# An example where this can hurt us 
In Btrieve you might have the following statement,
Show all names where name is between '' and '~'.

In Btrieve '~' is greater than all english characters `'x'<'~' == true` - so you'll get to see all the names.

In the SQL_Latin1_General_CI_AS the `~` sign is not greater than all english characters `'x' < '~' == false` - so you'll not see any rows.

This is a good example of why by default we use the `Latin1_General_BIN` collation when migrating from Btrieve to SQL

# Risks with Latin1_General_BIN
Although Latin1_general_BIN provides an exact behavior that is similar to btrieve in many respects, there is one place where it could cause problems and that's file names.
File names in windows are not case sensitive, so the file `orders.dat` and the file `Orders.dat` are the same file - with Latin_General_BIN in Sql Server, these are two different files, `orders` and `Orders`. This can cause problems when you have multiple classes for the same actual table - or when working with logical names, or EntityName expressions

