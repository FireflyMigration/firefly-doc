# How to set Oracle Connection

.NET does not require the workstation to have Oracle client installed.
The connection is done by using Oracle Data Provider for .NET (ODP.NET, Managed Driver). It is an Oracle dll which we provide during the migration (Oracle.ManagedDataAccess.dll)

The connection configuration file is called `tnsnames.ora`.
The .NET application needs this file in order to communicate with ODP.net and there are 3 ways for the application to find this file:

#### Bin folder (recommended)
When the application starts, it first searches for the `tnsnames.ora` in the folder where the EXE file is located, normally in the bin folder. If the file is there, the application uses it. 

#### TNS_ADMIN
TNS_ADMIN is an environment variable that points to the directory where the tnsnames.ora is located.
 
![](ora.jpg)


#### Replacing the need for tnsnames.ora with an entry in the INI

You can use the connection string from inside `tnsnames.ora` in the INI file as follows:
1) Create a logical name, for example "myOraConnection"
2) Set this logical name to be equal to the connection string as one line (Important as one line):


```csdiff
[MAGIC_LOGICAL_NAMES]
myOraConnection = (DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP)(HOST = XXXXXXXX )(PORT = XXXXX)))(CONNECT_DATA =(SERVICE_NAME = orcl)))
```

3) In the INI database section, set the connection string name to use this logical name  - %myOraConnection%

```csdiff
[MAGIC_DATABASES]
Northwind = DBMS, 14, Northwind, , , , NORTHWIND, NORTHWIND, +
NoMagicRecordLock, DontChangeFileInToolkit, CheckDefinition, NoCheckKey, +
NoFileLocks, , , NoCheckExist, 0, %myOraConnection% , NoAS400SrvrSort,

```

This option is useful in case you do not want to install or configure anything on the workstation.


#### misc

Oracle Data Provider for .NET <br>
http://www.oracle.com/technetwork/topics/dotnet/index-085163.html

tnsnames.ora <br>
http://www.orafaq.com/wiki/Tnsnames.ora
