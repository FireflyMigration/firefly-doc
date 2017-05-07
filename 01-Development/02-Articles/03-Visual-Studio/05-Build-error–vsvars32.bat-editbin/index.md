# Build error – “C:\Program Files (x86)\Microsoft Visual Studio 14.0\Common7\IDE..\tools\vsvars32.bat” editbin

In some cases, mainly when you upgrade VS, the build in 2015 will fail with the following message:

![](buildFail.png)  
This is due to the fact that Visual Studio checks for the environment variable according to the installed VS.  
To overcome this issue, make sure the C++ Tools option in the installer is selected. By default VS2015 only installs C# and VB.net, but not C++ with its tools.

![](vs_setup.png)

In VS 2017 the 'Post-build event command line' should be changed to:

call "C:\Program Files (x86)\Microsoft Visual Studio 14.0\Common7\Tools\vsvars32.bat"
editbin.exe /NXCOMPAT:NO "$(TargetPath)"
