# Viewing memory tables

In cases where memory tables are in use, there are cases the developer 
needs to check the content of a table while debugging.  

Using the migrated code you can view the content of the table
while in a breakpoint.

In order to do that you need to:
1. Open the Watch pane
2. Type "Shared.DataSources.Memory" in the Name
3. Expand it 
4. In the DataSet in the value you will notify a magnifing glass - press it
5. You will see the name of the first table in the combo and the records in the grid
6. In case you have more than one memory table, you can choose a different one from the combo

This is how it looks:
![MemoryTables](memorytables.gif "Viewing Memory Tables")

