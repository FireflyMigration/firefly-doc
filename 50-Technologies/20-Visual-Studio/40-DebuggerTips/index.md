keywords: debugger, debugging, debug

# Debugger tips

There are quite a few useful debugging tips that can be used when debugging a code using visual studio.  
Below are two unique ones that are also used in the Firefly code - but rather than the usual tips (such as conditional breakpoints, using the DebugHelper, listening to exceptions, etc.) these are used as attributes added to the code itself.

## DebuggerStepThrough 
Adding this attribute to methods / properties instructs the visual studio debugger to skip the code, so even if there is a breakpoint it will be skipped. While debugging the skipped code will appear in the call stack as "external code".
This is useful when you debug a code step-by-step and would like to skip some parts you know for sure are not a part of the problem.

### Example:
```csdiff
[DebuggerStepThrough]
class MyClass
{
    public bool Result = false;
    public void DoSomething()
    {
        Result = true;
    }
}
```

## DebuggerDisplay
Adding this attribute to classes allows you to set the informatin that will be displayed when the plus sign (+) is selected to expand the debugger display for an instance of the class..

### Example:
```csdiff
[DebuggerDisplay("Count = {Count}")]
class MyClass
{
    public int Count;
    public void DoSomething()
    {
        Count = Count++;
    }
}
```

>Other useful attributes are DebuggerHidden, DebuggerBrowsable and DebuggerTypeProxy
