

This article deals with how to view SQL statements in the Output Window of the Visual Studio IDE, which represents the interaction between the application and the database. Its very helpful to be able to actually see the SQL statements that are being executed by any program, to be able to optimize performance efficiently.

# Viewing the SQL

To view the generated SQL code in the Output window, add the following line to the Main method in Program.cs:

```csdiff
ENV.Data.DataProvider.ConnectionManager.DatabaseLogToDebugOutput = true;
```

Here we see the line within the context of the code
```csdiff
public static void Main(System.String[] args)
{
        System.Windows.Forms.Application.EnableVisualStyles();
        System.Windows.Forms.Application.SetCompatibleTextRenderingDefault(false);
        ENV.AbstractUIController.BackwardCompatibleFilterUI = true;
        ENV.Commands.SetDefaultKeyboardMapping();
        ENV.Commands.SetVersion9CompatibleKeyMapping();
        ENV.UserSettings.FixedBackColorInNonFlatStyles = true;
 
 
        ENV.Data.DataProvider.ConnectionManager.DatabaseLogToDebugOutput = true; // Instructs ENV to write the SQL code to the output window
 
 
        ENV.Data.DataProvider.ConnectionManager.UseDBParameters = false;
        ENV.UserSettings.InitUserSettings("Northwind.ini", args);
        ENV.Data.DateColumn.GlobalDefault = new Date(1901,1,1);
        Application.Run();
        ENV.UserSettings.FinilizeINI();
    }
```

Now, before running the application, on the View menu, click Output. This opens the Output window, containing the generated SQLcode to be viewed.

An example of the SQL code generated in the Output window, appears below:

```csdiff
ExecuteReader Duration: 0
ExecuteNonQuery - sp_cursorprepexec
 
 
Query Parameters:
@handle(Int32) = 
@cursor(Int32) = 
@paramdef(String) = 
@stmt(String) = 
SELECT ProductID, ProductName, SupplierID, CategoryID, QuantityPerUnit, UnitPrice, UnitsInStock, UnitsOnOrder, ReorderLevel, Discontinued 
FROM dbo.Products 
ORDER BY ProductID
@scrollopt(Int32) = 135170
@ccopt(Int32) = 8193
@rowcount(Int32) = 
 
 
ExecuteNonQuery Duration: 0
```

An example of the SQL output for a FIND relation (see also: :[relations in depth](Relations-in-depth.html) ) will look as follows:
```csdiff
ExecuteReader Duration: 0
ExecuteReader - 
SELECT CategoryID, CategoryName, Description 
FROM dbo.Categories 
WHERE CategoryID = @0
 
Query Parameters:
@0(Int32) = 0
```

Looking at the above SQL notation, we can see that it uses SQLparameters for the CategoryID value. This is more efficient SQL usage, but a bit harder to read.

In order to make the SQL more readable, we'll add the following line of code in the the Main method, immediately after the previously added line:
```csdiff
ENV.Data.DataProvider.ConnectionManager.UseDBParameters = false;
```
The generated SQL code for a FIND relation, as shown in the Output window will now look as follows, without the last 2 lines referring to query parameters :
```csdiff
ExecuteReader Duration: 0
ExecuteReader - 
SELECT top 1 CategoryID, CategoryName, Description 
FROM dbo.Categories 
WHERE CategoryID = 0 
 
ExecuteReader Duration: 0
```
---
# Execution Duration


Sometimes we are interested in the time it takes to execute a query, so, for every query that is executed, it's duration (in ms.) is reported immediately afterwards.

## Tip

When examining the time it takes for queries to execute, we look for queries whose execution time is lengthy. Reading each and every query's duration can be tedious and time consuming, so for ease of use, dots are added between the Duration and the ”:” character in terms of the execution time. The more dots there are, the longer the query is.

- For queries under 10 ms, no dot's will appear.
- For queries under 20 ms, one dot will appear - for example “Duration.:15
- For queries under 50 ms, two dots will appear.
- For queries under 100 ms, three dots will appear.
- For queries under 200 ms, four dots will appear.
- For queries under 500 ms, five dots will appear.
- For queries under 1000 ms (One second) six dots will appear.
And for queries over 1000 ms, seven dots will appear.
Now if I want to search for queries that take more then 100 ms, I just need to search for “Duration….” and find such queries.

This is useful to find bottle necks of unoptimized queries that can then be improved using indexes etc.