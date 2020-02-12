* Creating a method for each and every BindValue can become cumbersome
* Imagine if we had 10 or 20 of these.
* Also - to see the actual implementation of the method, we would need to go back and forth between our constructor and the  `GetDaysBetween` and `GetEndOfMonthOfFromDate` methods themselves 
* Also every time we create such a method we have to think of a name for it, and than only use it once



* That's why in C# they came up with a term called **anonymous methods** also known as **lambda expressions**
* **anonymous methods** aka **lambda expressions** are methods that are written in line, where they are used 
* Simply take the C#6 style method without it's name and put it in place.
* In our code we have the `GetDaysBetween` and `GetEndOfMonthOfFromDate` method that are only used once.
```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
-       ToDate.BindValue(GetEndOfMonthOfFromDate);
+       ToDate.BindValue(() => FromDate.EndOfMonth);
-       DaysBetween.BindValue(GetDaysBetween);
+       DaysBetween.BindValue(() => ToDate - FromDate);
    }
-   public Date GetEndOfMonthOfFromDate() => FromDate.EndOfMonth;
-   public Number GetDaysBetween() => ToDate - FromDate;
    ...
}
```

* Once you get used to it, it's easier to read and easier to write (a lot less code)
### Multiline vs single line
* A Single line **lambda expression** is written like this:
```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
+       ToDate.BindValue(() => FromDate.EndOfMonth);
+       DaysBetween.BindValue(() => ToDate - FromDate);
    }
  ...
}
```
* A multi line **lambda expression** is written like this:
```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
        ToDate.BindValue(() => FromDate.EndOfMonth);
+       DaysBetween.BindValue(() => 
+       {
+           Debug.WriteLine("Evaluating To Date");
+           return ToDate - FromDate;
+       });
    }
  ...
}
```

* A single line **lambda expression** doesn't need the curly brackets, and it doesn't need the keyword `return` to return a value
* A multi line **lambda expression** **needs the curly brackets**, and it **needs the `return` keyword to return a value**


<iframe width="560" height="315" src="https://www.youtube.com/embed/9VQXH9k25o8?list=PL1DEQjXG2xnKHKNIRzI4K6oZL-KulU-Vw" frameborder="0" allowfullscreen></iframe>

For a deeper discussion of these topics see [Lambda Expressions Generics and BindValue](lambda-expressions-generics-and-bindvalue.html)
