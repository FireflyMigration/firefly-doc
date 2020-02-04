keywords:version update,build,version,assemblyinfo

# Version Update


This utility updates all your `AssemblyInfo.cs` files.<br>

You can use it to automatically increment the build number (the third part of the version number)

Before:
```cs
[assembly: AssemblyVersion("4.6.0.32096")]
[assembly: AssemblyFileVersion("4.6.0.32096")]
```
Command:
```
VersionUpdate.exe
```
After
```cs
[assembly: AssemblyVersion("4.6.1.32096")]
[assembly: AssemblyFileVersion("4.6.1.32096")]
```
**note that the third part of the version was changed from 0 to 1**
## Update the full version number
Before:
```cs
[assembly: AssemblyVersion("4.6.0.32096")]
[assembly: AssemblyFileVersion("4.6.0.32096")]
```
Command:
```
VersionUpdate.exe version=1.2.3.4
```
After
```cs
[assembly: AssemblyVersion("1.2.3.4")]
[assembly: AssemblyFileVersion("1.2.3.4")]
```

## Command line arguments
You can provide this utility with two command line arguments:
1) Path - the path of the folder to search in - by default the current directory is used.
2) Version - the version to set in the `AssemblyInfo.cs` - if no version is specified it'll increment the build number.

For example:

`VersionUpdate.exe path=d:\northwind\dotnet version=4.6.1.32099`

## What is it good for?
It helps align the source code and the built dlls and exe files.
When you build your code, this version is embedded to the file, and can be viewed in its `properties` tab.
We recommend that before you run `buildRelease.bat` you'll use this utility to update the version for your source code, and commit to the version control tool.

Later when you'll want to find the source code for a specific version, you'll be able to trace back from the properties tab of the dll to the actual commit that it was built on.
##
Download the utility:
[VersionUpdate.zip](VersionUpdate.zip)

