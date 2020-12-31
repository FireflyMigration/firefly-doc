keywords: Call Program, Call Sub task 

![Call Prog](CallProg.png)

### Migrated Code Examples:

**Simple Call program / Subtask**

```csdiff
new CalledProg().Run();
Create<ICalledProg>().Run();
new SubTask().Run();
new SubTask(this).Run();
Cached<SubTask>().Run();
```
* [Read More about Create](calling-a-program-across-projects.html)
* [Read more about Cached](introducing-cached.html)
> We recommend `new` for in project calls, `Create` for cross project calls and `Cached` when using `KeepViewVisibleAfterExit` or when the called controller constructor is expensive (for example, an inner class with complicated report sections.)



**Call program with Arguments**

```csdiff
new CalledProg().Run("AAA", v_Num1);

```


**Using Result**

```csdiff
var tempFormat = ReturnVal.Format;
ReturnVal.Format = "";
new CalledProg2().Run("AAA", 5);
ReturnVal.Format = tempFormat;
```

**Using Form**
```csdiff
new Browse_TableA().Run(view: new Views.CallForm(this));

```

**Using Lock**
```csdiff
 LockCurrentRow();
 new CalledProg().Run(TableA.Code);

```


See also:  
[LockCurrentRow Method for UIController](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_LockCurrentRow.htm)  
[LockCurrentRow Method for BusinessProcess](http://www.fireflymigration.com/reference/html/M_Firefly_Box_BusinessProcess_LockCurrentRow.htm)  


