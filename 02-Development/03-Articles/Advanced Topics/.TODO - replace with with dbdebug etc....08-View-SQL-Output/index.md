# Debugging flags usage in the configuration file (INI)


Below are valuable flags for debugging purposes which you can add to the INI file by adding them under the [MAGIC_ENV] section.

GENERALERRORLOG = filename 
This flag will output errors that occur during the application execution to a text file. These errors affect the functionally of the application and therefore the log includes important information such as parameters, variables and call stack.
(Example: GENERALERRORLOG = c:\myDir\error.log)

TRACEFILE = filename 
This flag will output application errors that occur during the application execution to a text file. As oppose to the GENERALERRORLOG, the output information is minimal.
(Example: TRACEFILE = c:\myDir\error.log)

DBLOGFILE = filename
This flag will output all the SQL statements to a text file.
(Example: DBLOGFILE = c:\myDir\DB.log)

DBDEBUG = Y
This flag will output all the SQL statements to the Output window in Visual Studio.

DBNOPARAMS = Y
This flag will suppress the use of parameters which will make the SQL statement easier to read.

ALLWAYSSHOWDBERRORS=Y
You can use in your application database error events to capture and suppress the error returned from the database and display your own message instead.
Since the database error has important debug information such as the actual error and application call stack, adding this flag, will display the database error after your error is displayed.

REQUESTLOGFILE = filename
For programs that operate through an internet browser, use the this flag to record the names of programs executed as well as other statistics about their execution. The Request Log File is a file used by web applications, which records all the programs that are run using a browser. The following shows an example of the request.log containing details for three programs that have so far been executed.

PROFILER = filename
Setting this flag will start the profiler once the application starts and will save its information to the file you specified. It is usful for monitoring processes that run as the application starts, for Web application or in case developer tools option is disabled.

As with any setting from the INI file, the flags above can also be set using a command line arguments. (e.g /GENERALERRORLOG = filename /DBLOGFILE = filename /DBDEBUG = Y /DBNOPARAMS = Y )

Note – Using these flags affects the performance of the application and should therefore only be used when necessary. Also note that the flags are cumulative in respect of adding further comments as they occur. As such, if there is a need to keep a record of the log files for a specific incident, it is useful to make a copy of the files at that point so that they can more easily be used as a point of reference in solving that issue.