keywords:error opening connection login failed, Windows Authentication

Most SQL server application use Windows Authentication to login to the SQL Server.

You do that by not specifying the user and password in the configuration, in that case, SQL uses the user OS login to authenticate the user.

When you are running from a production web server, you are using IIS, and if you don't do any special configuration you'll get an "error opening connection login failed" error.

To solve that, you can:
1. Add the iis user to the trusted users of the sql server.
2. Specify a specific user and password in the configuration file (ini)
3. Specify a specific user and password in the `WebDemo/Global.asax.cs`:

Locate and uncomment the following line of code:
```csdiff
ConnectionManager.SetDefaultUserAndPassword("sa", "YOURPASSWORD");
```


## Using IIS Express
In our demo we use IIS express, and as such we can run using Windows Authentication just by setting the `Windows Authentication` property, in the project properties, to enabled.

![Project Properties](2017-11-03_12h10_14.png)
