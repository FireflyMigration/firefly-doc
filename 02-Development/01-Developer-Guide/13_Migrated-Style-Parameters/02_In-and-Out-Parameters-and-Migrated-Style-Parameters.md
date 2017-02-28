* Let's examine the "in" and "out" nature of the different parameters
* 
```csdiff
public void Run()
{
    Number myValue = 5;
    NumberColumn myColumn = new NumberColumn();
    myColumn.Value = 7;
    MethodA(myValue);
    MethodA(myColumn);

-   //MethodB(myValue); //this line would not work, since you can't send a value to a parameter of type column
    MethodB(myColumn);

    MethodC(myValue);
    MethodC(myColumn);
}
void MethodA(Number value)
{
    Debug.WriteLine(value);
+   value++;
}
void MethodB(NumberColumn column)
{
    Debug.WriteLine(column);
+   column.Value++;
}
void MethodC(NumberParameter parameter)
{
    Debug.WriteLine(parameter);
+   parameter.Value++;
}
```
Let's review the execution of this code:
* In line 3 we set the value of `myValue` to `5`.
* In Line 5 we set the value of `myColumn` to `7`.
* In line 6 we call `MethodA` and send it the value `5` (from the field `myValue`)
  * In line 15, the parameter called `value` now has the value `5`
  * In Line 17 we write the value received as a parameter (`5`) to the "output" window 
  * In Line 18 we change the value of the parameter called `value` to `6`.
  * Since `value` is of type `Number` (a "Value" type) that change is local to this method - and will not affect the actual value in the field `myValue` when `MethodA` is done executing.
* In line 6, once the `MethodA` is completed, the value in the `myValue` field stays the same as before the call - `5`
* In line 7, we call `MethodA` and send it `myColumn`. Since `myColumn` is a column, and `MethodA` receives a `Number` (a "Value" type), the code implicitly sends `myColumn.Value`, which means send the value stored in `myColumn` (`7`)
    * In Line 15, the parameter called `value` now has the value `7`
    * In Line 17 we write the value received as a parameter (`7`) to the "output" window
    * In Line 18 we change the value of the parameter called `value` to `8`.
    * Since `value` is of type `Number` (a "Value" type) that change is local to this method - and will not affect the actual value in the column `myColumn` when `MethodA` is done executing.
* Line 9 is skipped, because we can't send a "Value" type to `MethodB` which accepts only "Column" types
* In line 10, we send the column in the field `myColumn` (that has the value `7`)  to `MethodB`
  * In line 20 the parameter called `column` references to the same Column as the one in the field `myColumn`. This means that any change to the `Value` of `column` will be affect the `Value` of `myColumn` since both are actually the same Column.
  * In Line 22 we write the value received as a parameter (`7`) to the "output" window
  * In Line 23 we change the `Value` of the column referenced by the parameter `column` to `8`.
  * Since `column` is a Column type (`NumberColumn`) when we change it's `Value` we change the value of the column that was sent.   
* In line 10, once `MethodB` completed, the value in the column `myColumn` is now 8, as the column itself was sent to `MethodB`
### Migrated style parameters, `NumberParameter`
* In line 12 we are sending the "Value" in `myValue`(`5`) to `MethodC` that accepts a `NumberParameter`
  * In line 25, the `parameter` parameter now has the value `5` as was sent to it in line 12.
  * In Line 27 we write the value received as a parameter (`5`) to the "output" window
  * In Line 28 we change the value of the parameter called `parameter` to `6`.
  * Since on line 12, we send a "Value" to `MethodC` any change made in `MethodC` is limited to it's scope and will not affect the value once we exit `MethodC`
* In line 12, once `MethodC` is complete - the value of `myValue` remains `5`.
* In line 13, we are sending the "Column" in `myColumn` (value `8`) to `MethodC`
  * In line 25 the parameter called `parameter` references to the same Column as the one in the field `myColumn`. This means that any change to the `Value` of `parameter` will be affect the `Value` of `myColumn` since both are actually referencing to the same Column.
  * In Line 27 we write the value received as a parameter (`8`) to the "output" window
  * In Line 28 we change the `Value` of the parameter referenced by the parameter `parameter` to `9`.
  * Since `parameter` is a `NumberParameter` and on line 13, we sent it a "Column",  when we change it's `Value` we change the value of the column that was sent.   
* In line 13, after `MethodC` is complete, the value of the column referenced in `myColumn` field is now `9`  



<iframe width="560" height="315" src="https://www.youtube.com/embed/mt_TfTLVoOw?list=PL1DEQjXG2xnKwFgNR1U2nGp4GyrPETlZE" frameborder="0" allowfullscreen></iframe>

