# Keep using some of the application tables in Btrieve After the SQL Migration
In same cases we will like to work in SQL but also keep some tables in Btrieve, this can be if some of our tables are shared with other applications.
In this case we will need to change the DataSource of this tables, so we can keep working with it in Btrieve.

## Change the DataSource

1. First we will need to add the new DataSource to our migrated application.
2. Here the DataSource of migrated NorthWind application
![](2019-01-03_16h27_39.png)
3. Now Let us add a new DataSource
   1. notice the name "KeepInBtrive"
   2. notice that the new entry using ConnectionManager.
   3. notice that "GetDataProvider" point to the same "Btrieve" as the original one
![](2019-01-03_16h33_29.png)

## Set The Tables that we will like to keep working with in Btrieve

1. Change the table DataSource from Btrieve to KeepInBtrieve
![](2019-01-03_16h47_07.png)
![](2019-01-03_16h48_25.png)
![](2019-01-03_16h49_12.png)

2. Now When you run your application the data for "Categories" table will be from Btrieve, and the rest of your tables will be using SQL

