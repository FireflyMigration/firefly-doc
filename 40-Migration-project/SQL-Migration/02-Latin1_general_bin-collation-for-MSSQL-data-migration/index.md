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