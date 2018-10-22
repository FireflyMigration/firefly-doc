keywords:Firefly.Box.Context

Whenever you use multi threading in an application, either by using `AsyncHelperBase` for a UIController or by service mutliple requests for the iis in parallel, the class called `Firefly.Box.Context` comes into play.

Each thread will have it's own instance of the class called `Firefly.Box.Context`, you can access the context of the current thread by using the `Current` property of the class `Firefly.Box.Context`.
To list all the current active contexts you can use the `Firefly.Box.Context.ActiveContexts` class.

The `Context` class is responsible for keeping information that is relevant only for the current thread and making sure that each thread get's it's own separated values.

When ever you run a controller using the `AsyncHelperBase` class or recieve a new request - a new `Context` instance is created to serve that thread.

Once the work is done, the `Context` is disposed and all it's assets are disposed.

## The following topics should be considered:
1. Each context has it's own Controller Stack - you can see it in `Firefly.Box.Context.Current.ActiveTasks`
2. Each context has it's own connections to the database and it's own transactions
3. Each context has it's own instance of the `Application` class this means that when you set a value to a column that is defined in the `Application` class, it only affects that specific context.
4. `Application`'s `OnStart` event is executed when ever the first controller is called. - this means that it'll get executed when you calll using `AsyncHelperBase` class or when a new web request is served.
> when usign AsyncHelperBase class you can controll that behaviour with the `DisableApplicationStart` flag.

5. By default Memory Tables are not shared between contexts.
6. ParametersInMemory (getparam, setparam) are not shared between contexts - if you want to share values between contexts, use `SharedValSet` and `SharedValGet`
7. Ini values that are set using u.IniSet('xx',false) are not shared between contexts - each context will have it's own values.

## Sharing Data Between Threads
You can share data between threads by using the C# `static` keyword.
For Example:
```csdiff
class MyClass
{
	public static string CustomerName = "Important Customer";
}
```

## Saving Context Specific Data
There are two ways to save data per context - that will still be available in the context of that specific context.
### 1. Use the Context Object
Setting a context specific value:
```csdiff
//set the value
Firefly.Box.Context.Current["CustomerName"] = "Important Customer";
//get the value
System.Diagnostics.Debug.WriteLine(Firefly.Box.Context.Current["CustomerName"]);
//List value from all Current Contexts:
foreach (var item in Firefly.Box.Context.ActiveContexts)
{
    System.Diagnostics.Debug.WriteLine(item["CustomerName"];
}
```
> note that every value that is stored in the context and implements the `IDisposable` interface will get disposed when the context is disposed.
### 2. Using Context Static
You can use the generic `ContextStatic` class to maintain the ease of use of `static` with the Context separation.
```csdiff
public static ContextStatic<string> CustomerName = new ContextStatic<string>(() => "Default Value");
```

```csdiff
// set the value for the current context
CustomerName.Value = "Important Customer";
// get the value
System.Diagnostics.Debug.WriteLine(CustomerName.Value);
//List value from all Current Contexts:
foreach (var item in Firefly.Box.Context.ActiveContexts)
{
    System.Diagnostics.Debug.WriteLine( CustomerName.GetValueFromContext(item));
}
```
> this is better than using the `[ThreadStatic]` attribute since threads get reused and the `ContextStatic` is cleared and refreshed

## Important note
When you create your own threads, or use a non migrated web code that calls migrated code - make sure to call `Firefly.Box.Context.Current.Dispose()` when you are done, to close all active connections and release all context specific resources.


## Interesting codes to review in ENV
1. `RaiseOnContext` and `RaiseOnContextPrivate` method in `ControllerBase`
2. `UserMethods.CtxGetId`
3. `UserMethods.CtxSetName`
4. `UserMethods.CtxGetAllNames`
5. `UserMethods.CtxNum`
6. `UserMethods.SetContextFocus`
7. `UserMethods.DoOnContext`
8. `UserMethods.CtxKill`
9. `UserMethods.CtxLstUse`
10. `UserMethods.CtxProg`
11. `UserMethods.CtxClose`
12. `UserMethods.CtxStat`
13. `UserMethods.Prog`