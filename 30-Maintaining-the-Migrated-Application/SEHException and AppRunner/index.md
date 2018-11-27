keywords: SEHException, AppRunner, Crash, System.Interop.Services.SEHException, SEH, Exception,The process was terminated due to an unhandled exception

## Introduction
We've recently received reports from clients that experience intermittent crashes of .NET applications, when running from a network location or a mapped drive, possibly under Remote Desktop session.

## Symptoms
When you run the application from a mapped drive or a network location, the application crashes during execution.
The error details, which can be found the in Windows Event Viewer are similar to the following:
```csdiff
Framework Version: v4.0.30319
Description: The process was terminated due to an unhandled exception.
Exception Info: System.Runtime.InteropServices.SEHException
```

## The Cause
This is a known Microsoft issue in Windows Server 2008 and Windows Server 2012, as described in [this article](https://support.microsoft.com/en-gb/help/2536487/applications-crash-or-become-unresponsive-if-another-user-logs-off-a-r)


## Our Solutions
1) We've developed a small utility called AppRunner, which allows you to run the application from a network location, without having this issue.
You can download AppRunner from [this link](https://github.com/FireflyMigration/AppRunner/releases)

For details about how to use it please refer to the [ReadMe page](https://github.com/FireflyMigration/AppRunner/blob/master/README.md)

2) Using mklink.

Using the mklink command allow you to create a local directory with all the application files from the remote server. While saving the trouble of having a local copy, that will be needed to be updated from time to time, and no duplicate files.
To implement this please open command line window, and run this command :
```csdiff
mklink /D "local location on your hard drive, I.E. c:\northwind" "remote folder I.E. x:\fireflymigration\northwind\northwind.exe" 
```
/D Creates a directory symbolic link. The default is a file symbolic link.

Now you can see on your local hard drive a new folder named northwind, and you can run the application from there.
If needed you can create a northwind.Bat file that will do that for the end user:
```csdiff
If not exist c:\northwind mklink /D C:\northwind x:\fireflymigration\northwind\northwind.exe

c:
cd c:\northwind
start northwind.exe /ini=northwind.ini
```
