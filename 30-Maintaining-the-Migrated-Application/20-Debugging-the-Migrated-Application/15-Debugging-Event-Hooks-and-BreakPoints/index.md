Breakpoints are great, and you can use them in specific controllers when you know exactly what you're looking for, but sometimes you're not sure in which controller the code executes and you would like to put a break point to cast a wider net. 
For that case we've created a set of static events that you can register and add breakpoints in, to monitor general purpose stuff.

Normally you would register to that event for debugging purposes only and at the start of your application, so if it's a Windows Forms application you would register to any of these events in the `Init` or `Main` methods of the `Program` class.

Let's review the different types of events.
## Entity.EntitySavingRow
As of version 30725 there is a static event called 'EntitySavingRow' in 'ENV.Data.Entity'. This event will be fired whenever and there is an Update, Insert or Delete operation for an Entity.
It receives two arguments:
1. The `Entity` for which the OnSavingRow is called.
2. The Event args, that include the Activity (Update, Insert or Delete)

Here's an example of logging each insert operation to the output window
```csdiff
namespace Northwind
{
    public class Program
    {
        [System.STAThread]
        public static void Main(string[] args)
        {
            try
            {
                Init(args);
+               ENV.Data.Entity.EntitySavingRow += (entity, arg) =>
+               {
+                   if (arg.Activity == Activities.Insert)
+                   {
+                       System.Diagnostics.Debug.WriteLine("Insert Into " + entity.EntityName);
+                   }
+               };

                ApplicationCore.Run();
                ...
```

## Profiler.OnStartContext
As of version 30725
This event is fired just before anything is written to the profiler. This can be useful if you see something in the profiler and you wish to break on it, for example a specific sql statement etc...
Remember that the profiler has to be switched on for this breakpoint to work.

For example, I want to break whenever a specific SQL statement is executed:
```csdiff
Init(args);
ENV.Utilities.Profiler.OnStartContext += e =>
{
+    if (e.Name.Contains(@"Select ProductID, UnitPrice 
+From dbo.Products 
+Where ProductID = @0
+
+Parameters:
+@0(Int32) = 11 (B)
+"))
+    {
+        System.Diagnostics.Debugger.Break();
+    }
+};

ApplicationCore.Run();
ENV.UserSettings.FinalizeINI();
```

## ControllerBase.OnProcessingCommand
This event is fired whenever a command is about to be processed.
It receives two parameters:
1. controller - the controller which is about to process the command
2. command - the actual command.

This is a very useful event that helps track down who is handling an event that was raised. You can use this to find events that were raised and were not handled where you've thought they should be handled. Like handlers with `CurrentTaskOnly` pre condition - or multiple `Exit` events.
```csdiff
try
{
    Init(args);
+   ENV.ControllerBase.OnProcessingCommand += (controller, command) =>
+   {
+
+   };

    ApplicationCore.Run();
    ENV.UserSettings.FinalizeINI();
}
```
> for additional ways of debugging data changes see: [additional-events-for-data-related-debugging](additional-events-for-data-related-debugging.html)
## ControllerBase.OnRaise

This event is fired whenever an event is raised, either from a button or from a Raise command. Helps track down these Raise `Exit` that are all over the code.
Receives one parameter - the command that is being raised.

## HandlerCollectionWrapper.BeforeHandler
This event is fired just before a handler is executed. You can break in it and once you hit the Breakpoint, just Click F10 to go to the Handler's code.
It receives one parameter, the handler that is about to be invoked.

## ControllerBase BeforeExecute and AfterExecute
These events are fired before and after the execution of a controller. 
It receives one parameter - the controller that is about to be executed. You can create all sorts of creative if statements around that controller.
Here's an example of getting the root `BusinessProcess` and playing with it:
```csdiff
Init(args);
+ENV.ControllerBase.BeforeExecute += (controller) =>
+{
+    var bp = ENV.ControllerBase.GetTask(controller) as Firefly.Box.BusinessProcess;
+    if (bp != null)
+    {
+        if (bp.Relations.Count > 0)
+        {
+            System.Diagnostics.Debug.WriteLine("The controller " + controller + " was called and has relations");
+        }
+    }
+};

ApplicationCore.Run();
ENV.UserSettings.FinalizeINI();
```

## BeforeWrite and BeforeRead
These events are fired before a section is about to be written (or read) from an IO.
They exist at the following classes:
1. ReportSection.BeforeWrite - before writing a report form
2. TextSection.BeforeWrite - before writing a text section
3. TextSection.BeforeRead - before reading a text section
4. TextTemplate.BeforeWrite - before writing a text template (AKA merge form)

