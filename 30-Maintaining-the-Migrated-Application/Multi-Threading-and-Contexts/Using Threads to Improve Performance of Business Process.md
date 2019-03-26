keywords:parallel, paralel, async, run in new thread
In this article we show how to call a long business process to run on a new thread.

## Replace a normal call to a call in a new Thread
```csdiff
+ENV.Common.RunOnNewThread(() =>
+{
    new Demo.DemoLongProcess().Run();
+},false);
```

## Important things to know
### Context
Each thread has it's own Context, it's own connections to the database and it's own transactions.
Please review the [Article about Context](http://doc.fireflymigration.com/context.html)

### The OnStart of the Application Class
The on start of the application class runs for every thread - sometimes you may have a lot of logic there, you'll need to condition that logic to only run in the first time and not always.




<iframe width="560" height="315" src="https://www.youtube.com/embed/cXoog4IFA_k" frameborder="0" allowfullscreen></iframe>

## Monitoring the Thread progress
The `RunOnNewThread` method return a [system.threading.thread](https://docs.microsoft.com/en-us/dotnet/api/system.threading.thread) object that you can monitor.
You can use it's IsAlive property to monitor what's going on.
For example
```csdiff
var thread = ENV.Common.RunOnNewThread(() =>
{
    new Demo.DemoLongProcess().Run();
},false);
while (thread.IsAlive)
{
    MessageBox.Show("Waiting to complete");
}
MessageBox.Show("Done");
```

## You can wait for multiple Threads to be done using a simple List:
```csdiff
var threads = new List<Thread>();
//run thread one
threads.Add( Common.RunOnNewThread(() =>
{
    new Demo.DemoLongProcess().Run();
},false));
//run thread two
threads.Add(Common.RunOnNewThread(() =>
{
    new Demo.DemoLongProcess().Run();
}, false));
//run thread three
threads.Add(Common.RunOnNewThread(() =>
{
    new Demo.DemoLongProcess().Run();
}, false));


while (threads.Find(t=>t.IsAlive)!=null)
{
    System.Windows.Forms.MessageBox.Show("Waiting to complete");
}
System.Windows.Forms.MessageBox.Show("Done");
```
