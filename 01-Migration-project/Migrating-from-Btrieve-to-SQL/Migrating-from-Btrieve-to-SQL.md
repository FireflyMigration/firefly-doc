At this stage you should already be using the migrated .net application with your original Btrieve database.
Everything works great and it's time to migrate the data as well.
Firefly provide a fast and easy way to migrate all your data from Btrieve to SQL server. 
In addition, the migrated .net application is already designed to work with SQL server, 
but there are some adjusments specific to your application, that need to be done, in order to make sure everthing will work the same in SQL.
These adjusments will be described here.

##Prepering for SQL migration
In general anything in the application that is tied to Betrieve technology shoule be adjested or at list considered.
For example, in Btreieve, all tables are files on disk that could be copied, renmaed, deleted just like any other file. 
In SQL the tables are stored in SQL server database and are not accessed from the file system, 
thus any case in the original code that treats data tables as files should be changed. This is very easy to do and will be explained here.
Here is the full list of adjusments to the original code:
1. **Uses of IOCopy, IORen, IODelete for data files manupulations** - 
These uses can be easily traced by searching for the methods uses in all code files of the migraetd application. 
For example, in order to find all uses of IOCopy method search for the text "u.IOCopy(" in all your .cs files.
Only cases where the file is a Btrieve data, you should change the method to the equivalent DBCopy

##Decisions that have to be made
