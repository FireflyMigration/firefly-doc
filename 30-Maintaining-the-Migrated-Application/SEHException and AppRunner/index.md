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


## Our Solution
We've developed a small utility called AppRunner, which allows you to run the application from a network location, without having this issue.
You can download AppRunner from [this link](https://github.com/FireflyMigration/AppRunner/releases)

For details about how to use it please refer to the [ReadMe page](https://github.com/FireflyMigration/AppRunner/blob/master/README.md)

