When you want to create a windows service, you can take the long route as described in the articles below - or take the short route which is:

## Creating a windows service, the short story

### Step 1 add a reference
Add a reference to `System.ServiceProcess`


### Step 2 Create the Service Class 
Add the `MyService` class
```csdiff
class MyService : System.ServiceProcess.ServiceBase
    {
        System.Threading.Thread theThread;
        protected override void OnStart(string[] args)
        {
            theThread =  ENV.Common.RunOnNewThread(() => {
                Application.Run();
            },false);
        }
        protected override void OnStop()
        {
            // you are welcome to stop the service in a less agressive way then killing the thread :)
            // just set some static field that is used as the Exit condition of the controller with the loop
            theThread.Abort();
        }
    }
```

### Step 3, run the service when the application starts
In the `Program.cs` add the following lines:
```csdiff
[System.STAThread]
        public static void Main(string[] args)
        {
            try
            {
                Init(args);
+               if (!System.Environment.UserInteractive)
+               {
+                   System.ServiceProcess.ServiceBase.Run(new MyService());
+                   return;
+               }
                Application.Run();
                ENV.UserSettings.FinalizeINI();
            }
            catch(System.Exception e)
            {
                ENV.ErrorLog.WriteToLogFile(e, "TOTAL CRASH");
                System.Environment.ExitCode = 1;
                ENV.Common.ShowExceptionDialog(e);
            }
        }
```

### Setup the Service:
simply use the [sc.exe](https://docs.microsoft.com/en-us/windows-server/administration/windows-commands/sc-create) to register the service.
Here's an example
```sh
sc.exe create "Northwind Service"  binpath="c:\Northwind\Northwind.exe"
```

And you're done.

## Creating windows service, the long way
Here are a set of videos i've created a few years ago with a more conventional explanation on how to create a windows service.