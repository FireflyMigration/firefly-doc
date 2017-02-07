keywords: ret,result,call operation
Name in Magic: **Ret, Result**  

****

The migrated code will define in the called program a variable with the same type as define for the return value in the calling program, called _taskResult.  
That variable will return the required value to the calling Method.  
The calling Method receives this value.

For example, in the calling Method, a value is returned to v_return which defined as Alpha in the original code:

```csdiff
 v_return.Value = new called().Run();
```

In the called Method, a Text variable defined in the Class:
```csdiff
Text _taskResult;
```  


The variable is returned to the calling class by using the return keyword in the run() method after the execution ends.  

```csdiff
public Text Run()
{
    Execute();
    return _taskResult;
}
```