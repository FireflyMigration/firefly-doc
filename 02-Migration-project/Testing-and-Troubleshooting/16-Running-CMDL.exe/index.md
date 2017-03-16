﻿# Running CMDL.exe

In some cases, we want to call a public program inside the application using a command line, For example, Windows Scheduler task which runs a command with parameters

In order to do so, we need to use the CMDL project ( e.g Northwind.cmdl). Inside the bin folder of the project we will find the executable **Northwind.cmdl.exe** and below is the syntax of how to use it:

C:\>*D:\Northwind\Dotnet\Northwind.cmdl\bin\Debug\Northwind.cmdl.exe*  
/URL=*http: //localhost/Northwind.server/services.aspx* /**PRGNAME**=AutoBatch

Another option to run the command is to first set the parameters in the INI file (located in the same folder of the executable) and just run Northwind.cmdl.exe as follows:

[MAGIC_ENV]  
URL = *http: //Northwind/Northwind.Server/Services.aspx*  
PRGNAME = AutoBatch  

C:\>*D:\Northwind\Dotnet\Northwind.cmdl\bin\Debug\Northwind.cmdl.exe*

Notice that while the process is running, you can check its progress in:  
*http: //localhost/Northwind.server/services.aspx*

 