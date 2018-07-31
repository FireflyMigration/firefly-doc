* When working with parameters, we distinguish between "Value" parameters (ie `Number`) and "Column" parameters (ie `NumberColumn`)
* A method that receives a "Value" parameter, for example `MethodA` can receive either a value parameter or a column parameter (lines 5 and 6)
* A method that receives a "Column" parameter, can only receive a Column (line 9). If you try to send it a "Value" parameter, you'll get an error (line 8)
* That way you can easily distinguish between "In" parameters, or "Value" parameters as we call them and "In Out" parameters, or "Column" parameters as we call them.
```csdiff
public void Run()
{
    Number myValue = 5;
    NumberColumn myColumn = new NumberColumn();
    myColumn.Value = 7;
    MethodA(myValue);
    MethodA(myColumn);

-   MethodB(myValue);//this line would not work, since you can't send a value to a parameter of type column
    MethodB(myColumn);
}
void MethodA(Number value)
{
    Debug.WriteLine(value);
}
void MethodB(NumberColumn column)
{
    Debug.WriteLine(column);
}
```

* In magic there was no way to make that distinction, so in the migrated code we needed to create a parameter type that can receive both "Value" and "Column"
* This problem is solved by using the `NumberParameter` type (Line 22), which can receive both "Value" (Line 11) and "Column" (Line 12) and in the case of "Value" work as an "In" parameter and in the case of "Column" work as an "In Out" parameter
```csdiff
public void Run()
{
    Number myValue = 5;
    NumberColumn myColumn = new NumberColumn();
    myColumn.Value = 7;
    MethodA(myValue);
    MethodA(myColumn);

-   MethodB(myValue);//this line would not work, since you can't send a value to a parameter of type column
    MethodB(myColumn);

+   MethodC(myValue);
+   MethodC(myColumn);
}
void MethodA(Number value)
{
    Debug.WriteLine(value);
}
void MethodB(NumberColumn column)
{
    Debug.WriteLine(column);
}
+void MethodC(NumberParameter parameter)
+{
+    Debug.WriteLine(parameter);
+}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/RVXdR1L41G8?list=PL1DEQjXG2xnKwFgNR1U2nGp4GyrPETlZE" frameborder="0" allowfullscreen></iframe>

