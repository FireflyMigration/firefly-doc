keywords: editbin, error, build

# Build error – “C:\Program Files (x86)\Microsoft Visual Studio 14.0\Common7\IDE..\tools\vsvars32.bat” editbin


## Visual Studio 2015
In some cases, mainly when you upgrade VS, the build in 2015 will fail with the following message:

![](buildFail.png)  
This is due to the fact that Visual Studio checks for the environment variable according to the installed VS.  
To overcome this issue, make sure the C++ Tools option in the installer is selected. By default VS2015 only installs C# and VB.net, but not C++ with its tools.

![](vs_setup.png)


## Visual Studio 2017
If you are using VS2017, during the installation, make sure to check "Desktop development with C++" 

 ![](vs2017setup.png)

 In both VS2015 and VS2017, you can configure this even after VS is already installed. Go to "Add/Remove Programs", Right-Click on VS installation -> you should get an option to modify the installation.

## What is it good for?
In the migration we ran into cases where old com component or external dll's would crash with an error regarding "Data Execution Prevention" and other wierd crashes.

Here are some examples of the errors we got:
1. System.DllNotFoundException - Unable to load DLL 'xxx\mgchart': A dynamic link library (DLL) initialization routine failed. (Exception from HRESULT: 0x8007045A)
2. System.DllNotFoundException - Unable to load DLL 'some dll': Invalid access to memory location. (Exception from HRESULT: 0x800703E6)
3. Errors with a dll called export.dll
4. Errors with a dll called mgexport.dll
5. Errors calling a crystal report dll.

After researching the matter we found the running `editbin /nxcompat` with some configuration solved this problem for these com components.
For more info on edit bin see [Microsoft editbin documentation](https://msdn.microsoft.com/en-us/library/d25ddyfc.aspx)

Initially we've added it to every migration as a post build event, but in recent migration we only add it if we run into a bug that justifies it.

Up to Visual Studio 2015 the post build event was as follows:
```
call "$(DevEnvDir)..\tools\vsvars32.bat"
editbin.exe /NXCOMPAT:NO "$(TargetPath)"
```

In Visual Studio 2017, Microsoft has changed the `DevEnvDir` requiring a more complicated post build event that searches for the editbin:
```
IF EXIST "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Enterprise\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Enterprise\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25ProgramFiles%25\Microsoft Visual Studio\2017\Enterprise\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Enterprise\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Professional\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Professional\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25ProgramFiles%25\Microsoft Visual Studio\2017\Professional\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Professional\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Community\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Community\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25ProgramFiles%25\Microsoft Visual Studio\2017\Community\VC\Auxiliary\Build" call "%25ProgramFiles(x86)%25\Microsoft Visual Studio\2017\Community\VC\Auxiliary\Build\vcvars32.bat" &amp;&amp; goto :run
      IF EXIST "%25VS140COMNTOOLS%25" call "%25VS140COMNTOOLS%25VsDevCmd.bat" &amp;&amp; goto :run
      IF EXIST "%25VS120COMNTOOLS%25" call "%25VS120COMNTOOLS%25VsDevCmd.bat" &amp;&amp; goto :run
      IF EXIST "%25VS110COMNTOOLS%25" call "%25VS110COMNTOOLS%25VsDevCmd.bat" &amp;&amp; goto :run
      IF EXIST "%25VS100COMNTOOLS%25" call "%25VS100COMNTOOLS%25VsDevCmd.bat"
      :run
      editbin.exe /NXCOMPAT:NO "$(TargetPath)"
```

If you want you can copy this text to the Post Build event of your projects and it'll work in VS2017.

That said - most application don't use wierd com component or external events, and if they do, we recommend to remove them.

So my recommendation to anyone who finds this enoying, remove it, test your external dll's and coms and if all is ok - live happily ever after without it.

