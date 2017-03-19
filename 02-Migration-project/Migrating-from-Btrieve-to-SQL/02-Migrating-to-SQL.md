## Preface
At this stage, you already made the required adjustments to prepare the migrated application to SQL.
Firefly has delivered everything you need to start migrating the data from Btreive to SQL.
This article explains the process of migrating the data from Btrieve to SQL.

## Setting Up
Before you can start migrating make sure you have:
1. All the btrieve files for the migration on the same machine that runs the migration process.
It is recommended to use SSD for best performance and shortest migration time.
2. You should have an SQL server installed and ready with user credentials for logging in.
3. Please add the following logical name to the ini file of the .NET application:
   1. SQLMigServer = ***your server name***
   2. SQLMigDatabase = ***your database name***
   3. SQLMigUser = ***your username***
   4. SQLMigPassword = ***your password***


## Creating the Database
1. Run the application and login as supervisor.
2. Right click on the status bar to open the context menu.
3. Under Developer tools, select **SQL Migration - Create DB script**
4. Copy the SQL text and run it inside Microsoft SQL Server Management Studio
5. It is important to use the provided script as is, 
as it has the correct collation and other configuration that make sure your application will behave in SQL the same as the Btrieve version.

Make sure the new database is created and appear on the databases list in Object Explorer.

## The Migration Monitor
Once the database is created, you can open the Migration Monitor by right clicking the status bar and selecting Developer Tools -> SQL Migration - Monitor.
The monitor is the only tool you need to run the migration and get the results.

### Setup
In the monitor screen, click on the Setup button. 
This will collect all the data files that are going to be migrated and start counting the rows of each table.
Once completed, you can see a lot of details about each table, such as its class name, number of rows, original table name (file name) and target table name.

### Run the migaration
In the monitor screen, click on the Run Migration button. A small window will be displayed allowing you to set the number of engines to run in parallel.
The default value is the number of cores on the current machine and you can leave it as is and press "Start the engines".
Onces started, the monitor will display the progress of the migration.

### Using More Engines
In some cases when you have a lot of tables, adding more engines may make the entire migration complete faster.
You can add more engines at any time by clicking the "Run Migration" button again.
The number of engines that are currently active is displayed at the top the screen.

## Dealing with Errors
Once the migration is completed you will see the status of each table. Most tables should have a "Done" status with number of rows migrated equal to the Total Rows of the original table.
Some table might have another status, such as MigFailed or IndexFeiled.
In these cases, the error details will be displayed in the big text area at the bottom of the screen.
Please consult with Firefly should you have any questions about the errors and how to deal with them.


### Duplicate key
This error might occur when the original table have data that cause a duplicate index.
The specific duplicate index value is displayed in the error details. so that you can investigate the original table and fix it by removing the duplicate row.

### Migrating a single table again
In case you need to migrate a single table again, right click on the table in the Monitor Screen and switch to ready.
Then run the migration again. Only table with "ready" status will be migrated dropped and migrated again.

## Testing the migrated application in SQL
Once the migration is completed you can run the application and switch to SQL by right clicking the status bar and select "SQL Migration - Switch to Btrieve / SQL" under the Developer tools sub menu.
An indication of running in SQL mode is displayed in the application name on the status bar which will end with ""SQL".
Select the option again will switch the application back to Btrieve mode.