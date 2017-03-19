## Some Decisions to make
### Multiple schemas vs Prefixing the tables
Some applications have group of Btrieve tables in a separate folder for different purposes. 
For example, tables that serve a specific module named "Reports" may be stored in a folder named "ReportsTables".
It is recommended to migrate all the tables of the application into one SQL database (schema). 
This makes the maintenance and backup of the database very easy. 
In order to differentiate these tables, it is possible to add  a special prefix to their name,
for example all the tables from the ReportsTables folder will have the prefix "rpt_" in their SQL column name.
Alternatively, it is possible to migrate these tables into a separate SQL database, which is less recommended.

### Naming Tables
In Magic, each table has a name (caption) and a DB Table name.
In Btrieve the DB Table name usually refer to the file name, which might be invalid SQL name.
In this case, we use the captions as SQL names for the table and fix them so that there will be SQL style without any spaces for example "my table name" will be changed "MyTableName".
This is the standard and recommended option but there are alternatives that you can choose:
1. Using the captions as is (i.e. "my table name")
In case you used Actian PSQL (formerly pervasive) heavily and you want to keep the original SQL commands in the code which uses the captions as table names.
2. However this will require adjustments to all the table names which are based on expressions.

### Naming Columns 
As with table names, Btrieve has no notion of Column names. The only thing that matters in the table structure is the columns position.
In SQL, column names are important and are based on the columns captions of the original application.
However, if your application uses SQL commands and have different columns names in your tables DDFs (Data Definition File),
 the column names should be adjusted.
 Please prepare a use case and consult with Firefly.

### Data Storage
Most applications store dates as char(8) in the database and store times as numbers.
In Btrieve, there could be non-standard ways to store data values. For example storing dates as numbers.
If your application uses special kind of storage for dates, times, booleans etc, please prepare use cases and consult with Firefly.

