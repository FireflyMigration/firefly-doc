keywords:RunOnUIThread,RunOnLogicThread,RunInUIThread,RunInLogicThread
When working with multiple threads that present forms, one must be aware of the threads in which one is running, and what exactly they are trying to do.

## Background
When running an application with one thread, everything is simple, both the logic and the UI run on the same thread and it all works great.

When you run things in parallel, it gets a bit more complicated than that. 

For each call to "RunAsync" a new thread opens, and runs that code. In that thread you can find the call stack of all running tasks, the thread will use a different connection from the previous thread and will manage all of it's transaction etc.....

UNfortunately windows have a limitation that all call to code that concerns the UI, must be made in the thread where the form was originally created.

Let's look at a scenario:
1. we ran the application and have Thread 1 that serves both as UI thread and logic thread.
2. On thread one, we open the MDI form and a few other forms.
3. We call `RunAsync` to run a program in a new thread - Thread 2.
4. We want that program on Thread 2, to open a form, that will still be in the MDI that was created in Thread 1.
5. When we do that in windows forms, we'll get a `Cross-thread operation not valid` exception.
Windows expects that when you want to run a command on the UI from Thread 2, you'll take care to switch back to the UI thread and run the command there.

The migrated code takes care of that for you, and makes sure that any UI command will be run on the UI thread - and any logic command will be run on the Logic Thread (Thread 2 in our case)

Let's consider the following:
1. On Thread 2, we have a controller with a button that when it's clicked, we want  it to run a child controller on Thread 2.
2. The Original button Click Command, happens in the UI Thread - but the migrated code, makes sure to switch it to execute in the Logic Thread (Thread 2) to get a coherent behavior.

## Helper methods
To provide you with the same control we use, there are two important methods that you can use:
1. `Context.Current.InvokeUICommand` - To be used while you're in the logic thread, and you want to run something on the UI thread, like setting a control's text etc....
2. `RunInLogicContext`, exists in the form be used to make sure that the code that is about to run will be executed in the relevant logic thread.

When you are using a non migrated control, that fire events, and in these events you want to call code that will run in the logic thread, you must use the `RunInLogicContext` method for that.
For example:
```csdiff
private void button2_Click(object sender, System.EventArgs e)
{
+   RunInLogicContext(() =>
+   {
        new SomeProgram().Run();
+   });
}
```

## What will happen if I don't do that
Well, you might run into trouble :)

In some cases you would get an exception of type `Thread blocked by UI code` (in previous version you might get a `NotImplementedException`)