keywords: debughelper,debug

# Using the DebugHelper class

There are various ways and approaches to debugging.  
In most cases, when debugging the migrated code, using the **Profiler** will either point you to the place   
in the code you are looking for or alert you in case there was any kind of exception.  
To read more about it, please see the [profiler articles](http://doc.fireflymigration.com/fireflyprofiler.html)

However, there are cases in which you would like to get more information about the executing code, or be able to  
jump to the relevant code straight from the call stack.  
For example, you have a problem with a program that reads an external file or prints a report and you would like to debug it.
This is where the ```DebugHelper``` class comes to the rescue :)  

## Initializing 

Located in the ```Shared``` folder (either a separate project or part of the ```Base``` project),  
if you choose to activate and use it, you first need to initialize it.  
This is done in the program.cs file (located in the startup project), as the last line of code:

```csdiff
public static void Init(string[] args)
{
    System.Windows.Forms.Application.EnableVisualStyles();
    System.Windows.Forms.Application.SetCompatibleTextRenderingDefault(false);
    ENV.UserSettings.Version10Compatible = true;
    Text.StopProcessingFormatOnCharF = true;
    ENV.Data.DateColumn.GlobalDefault = new Date(1901,1,1);
    ENV.Commands.SetDefaultKeyboardMapping();
    ENV.Commands.SetVersion10CompatibleKeyMapping();
    ENV.Common.ApplicationTitle = "Northwind";
    ENV.UserSettings.FixedBackColorInNonFlatStyles = true;
    ENV.UserSettings.InitUserSettings("Northwind.ini", args);
+   Shared.DebugHelper.Init();
}

```

## Usage

During the execution of the application you can place breakpoints in the methods of the ```DebugHelper``` class and use the call stack to follow the code execution path.

These are the methods you can use - place a breakpoint in the relevant method according to its usage:
1. ```SectionRead()``` - break the execution when reading from an external file.  
2. ```SectionWrite()``` - break the execution when writing to a file or printer. 
3. ```ControllerExecute()``` - break the execution whenever a controller starts its execution (program or task).
4. ```Raise()``` - break the execution whenever an event is raised.
5. ```ProcessingCommand()``` - break the execution whenever a controller starts processing a command (it can be an event without a specific handler, for example *Next / Previous row*). The execution will break before the actual handler itself is reached and the call stack will show the controller that is about to process the event. This is a powerful option that helps in all the cases in which the event raising and handling are done in separate parts of the code.
6. ```HandlerInvokes()``` - place a breakpoint here if you want the execution to break just before a handler execution. At this point pressing <kbd>F11</kbd> **twice** will bring you to the first line of the handlers' code.

## Advanced

The fun really begins when adding code inside the methods.  
Here are some examples:
1. Break only whenever a certain type of controller is executed.
```csdiff
static void ControllerExecute(ControllerBase controller)
{
+   if (controller is BusinessProcessBase)
+   { }
}
```
Place the breakpoint on the curly brackets inside the ```if``` to break the execution only if the controller about to be executed is a ```BusinessProcess```.
Other types are ```AbstractUIController``` for all UI controllers, or ```FlowUIControllerBase``` / ```UIControllerBase``` if you want to be more specific.  

2. Break only whenever you are looking for a certain property of a controller.
```csdiff
static void ControllerExecute(ControllerBase controller)
{
+    var bp = ControllerBase.GetTask(controller) as Firefly.Box.BusinessProcess;
+    if (bp != null)
+    {
+        if (bp.bp.Relations.Count > 0)
+        { }
+    }
}
```
In this example placing the breakpoint in the 2nd if will break the execution only if the controller is using Relations.