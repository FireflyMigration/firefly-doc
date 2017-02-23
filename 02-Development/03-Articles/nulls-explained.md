Keywords:"Object reference not set to an instance of an object",

In this page we'll Demo and explain:
* `null` is a special value that indicates that there is no value 
* `null` is different than '0' or '"";
* if a member value was not set, it's value is `null`
* Explain that when you get the "Object reference not set to an instance of an object" exception, it means that you are trying to use a field that has a `null` value - it's value was not set.
* Not all types can have a null value, for example `int`, `bool`, and `DateTime` can not havea a null value because they are `structs`

```csdiff
string s = null;
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/9fawzsxoiiI?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>
---
