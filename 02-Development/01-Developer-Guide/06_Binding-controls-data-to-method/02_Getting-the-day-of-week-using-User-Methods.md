* We can use the `UserMethods`, or it's short `u` to get the day of week using the migrated version of the functions we already knew in magic. To read more about it see [UserMethods Class](usermethods-class.html)
* User methods class is important as it teaches us about subtleties like *"Date can be null"*  or *"Date can be empty"* and handles it for us.
```csdiff
internal Text GetDayOfWeek()
{
-   return Orders.OrderDate.DayOfWeek.ToString();
+   return u.NDOW(u.DOW(Orders.OrderDate));
}
```

* In the code of the `DOW` method we can see that we write - `date.DayOfWeek + 1`. From that we can learn that in .NET Sunday is 0, and in the migrated code, Sunday was 1. 
The difference that in the original code, the first element of everything (a string, week days, etc...) was 1 and in .NET it's 0 is something to remember for your future .NET developer.

<iframe width="560" height="315" src="https://www.youtube.com/embed/zky5_J5oYQE?list=PL1DEQjXG2xnKm-XBP3t3KCFZzWMVogMlj" frameborder="0" allowfullscreen></iframe>

