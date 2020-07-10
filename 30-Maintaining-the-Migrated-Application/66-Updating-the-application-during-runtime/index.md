keywords:Apprunner,update

# Updating the application during runtime (AppRunner)

### The challange

Users are running the application from the server and you want to release a new version which means - to update the executable (e.g Northwind.exe)

### The problem

You cannot update the executable while users are still using the application as they lock it.

### The solution

AppRunner utility. (Download: [AppRunner.zip](AppRunner.zip))

This utility serves as a middleman and starts your application by calling its executable.  
In case you want to update the application, you do it via AppRunner and the next time the user will start the application - he will use the updated one

### How do I use it?
The utility can only run together with its configuration file located in the same folder - `AppRunner.Settings`

The configuration contains the following arguments:


- **ExeFile** – The name of the .exe file you want to run (e.g. "D:\Northwind\bin\Northwind.exe") - **mandatory**
- **WorkingDir** – The working directory path (e.g C:\Temp)
- **CommandLineArgs** – Arguments you would like to send to the application (e.g /ini=c:\temp\Myini.ini)

> Note that you can change the name of AppRunner.exe to any name you like, as long as you have a the configuration file with the same name


<iframe width="560" height="315" src="https://www.youtube.com/embed/ua-xCdzgtys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>



