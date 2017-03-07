## Preface
At this stage you should already be using the migrated .NET application with your original Btrieve database.
Everything works great and it's time to migrate the data as well.
Firefly provide a fast and easy way to migrate all your data from Btrieve to SQL server. 
In addition, the migrated .NET application is already designed to work with SQL server, 
but there are some adjustments specific to your application, that need to be done, in order to make sure everything will work the same in SQL.
These adjustments will be described here.



## Prepering for SQL migration
In general anything in the application that is tied to Btrieve technology should be adjusted or at list considered.
For example, in Btrieve, all tables are files on disk that could be copied, renamed, deleted just like any other file. 
In SQL the tables are stored in SQL server database and are not accessed from the file system.
Firefly has done many migrations from Btrieve to SQL and can help you decide what would be the right solution for your application.
Our objective is that you will continue developing your .NET application using Btrieve,
while at the same time you can do the required adjustments to have a stable ready SQL version of the application using the same code.
Thus, in any case where data tables are treated as files in the original code, please prepare a use case and consult with Firefly about the appropriate adjustment.


Here is a list of special usages that might exist in your application and need to be considered: 

### IOCopy, IORen, IODelete for data files manupulation
These uses can be easily traced by searching for the methods uses in all the code files of the migrated application. 
For example, in order to find all uses of IOCopy method **search for the text "u.IOCopy("** in all your .cs files.

### OS Command
**Search for "ENV.Windows.OSCommand("** to find all the uses of the OSCommand and check if the command has anything to do with data files.
For example if the OSCommand copies a data file use DBCopy to do the same in the SQL version.

### Dll calls to Btrieve (W32mkde)
This is not very common but we have seen some applications that has calls to the Btrieve dll.
**Search for "W32mkde"** to check if such calls exists in your application. If so, prepare a use case and let us know.

### Dynamic names of tables
The table names can be changed in runtime in many ways:
1. Using logical names for tables and set the logical name in runtime using the IniPut() function or by using different ini file for different systems.
2. Using expressions for table names. For example, a program can change the table name so that it ends with the terminal number (using the Term() function).

**To trace these cases search for the text "EntityName = ".**
You may find code lines that set the EntityName in the OnLoad method of some of your programs.
There are two things to consider here:
1. Do we need to migrate more than one data file to SQL. 
For example if there is a separate table for each terminal and we need all the data permanently in SQL.
2. Is this going to work in runtime? If the table name is a valid SQL table name, than it should be OK in SQL as long as the tables exists and migrated. Please verify that it works.
However, if the table name is not valid, for example it is "c:\temp\sometable.dat", than it should be adjusted.
Please prepare some use cases of your application that demonstrate this and consult with Firefly about the right adjustment to your application

### Actian PSQL (formerly Pervasive) and SQL Commands
If you have used PSQL to enable SQL commands (Direct SQL) to your tables via ODBC, the SQL code may need to be adjusted.
**Search for “new Dynamic” to find all the usages in your application.**
Again, please find some use cases in the application, explain how they work from the user perspective and consult with Firefly.

### Using the same table structure with different column names
In Btrieve it is possible to use the same data file with different tables that have the same structure and differ only in the column names.
If you have such a case in your application please find a use case and consult with Firefly.

### Using the same talbe with different structure
In Btrieve it is possible to refer to the same data file with different table structure.
For example, if a table has the following fields:
1. FirstName, alpha 50
2. LastName, alpha 50

It is possible to create a second table structure for the same data file,
 which has only one column named FullName with length of 100.
Both structures will open the file and show the data in it.


## Some Decisions to make
### Multiple schemas vs Prefixing the tables
Some applications have group of Btrieve tables in a separate folder for different purposes. 
For example, tables that serve a specific module named "Reports" may be stored in a folder named "ReportsTables".
It is recommended to migrate all the tables of the application into one SQL database (schema). 
This makes the maintenance and backup of the database very easy. 
It is possible to give some of the tables a special prefix,
for example all the tables from the ReporstsTables folder will have the prefix "rpt_" in their name on SQL server.
Alternatively, it is possible to migrate these tables into a separate SQL database, which is less recommended.

### Naming Tables
In magic the tables have captions and DB Table name.
In Btrieve the DB Table name usually refer to the file name, which might be invalid SQL name.
In this case, we use the captions as SQL names for the table and fix them so that there will be SQL style without any spaces for example my table name will be changed MyTableName.
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


## Summary
The most important purpose of this article is to list the special cases that need to be considered when migrating the data from Btrieve to SQL.
Now that you are aware of all them, please make sure you have use cases in your application that you can demonstrate to Firefly. Together we will decide on the best solution that you can apply to your specific application.
Firefly will deliver a version with some adjustments to the data migration engine, based on these decisions.
Once the application is ready for the migration, you can run the migration and start testing the application in SQL using the use cases that were prepared in advance.
While testing the SQL version, you might find some performance differences. 
This is because Btrieve and SQL are very different technologies designed with different approach.
Firefly can help in improving any performance issue that might be found in the SQL version.
As always, please prepare use cases to demo these issues and consult with us.