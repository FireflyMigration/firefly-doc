* Func`<dataType>` means a method that returns a dataType.
* Func`<Date>` means a method that return `Date`
* Func`<Number>` means a method that return `Number`
* Func`<Time>` means a method that return `Time`
* Func`<Text>` means a method that return `Text`
* Func`<Bool>` means a method that return `Bool`

* see [Func Power Point Presentation](Func.pptx)
* Bind the value of the `DaysBetween` Column, Use Visual Studio's "Generate Method" factoring to create it.  
![2017 02 26 10H41 42](2017-02-26_10h41_42.png)
```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
        ToDate.BindValue(GetEndOfMonthOfFromDate);
+       DaysBetween.BindValue(GetDaysBetween);
    }
+   public Number GetDaysBetween()
+   {
+       return ToDate - FromDate;
+   }
    public Date GetEndOfMonthOfFromDate()
    {
        return FromDate.EndOfMonth;
    }
  ...
}
```
### Use C#6 style methods to write shorter code
```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
    public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
        ToDate.BindValue(GetEndOfMonthOfFromDate);
        DaysBetween.BindValue(GetDaysBetween);
    }
+   public Number GetDaysBetween() => ToDate - FromDate;

+   public Date GetEndOfMonthOfFromDate() => FromDate.EndOfMonth;
  ...
}
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/-nr5FgbFYpo?list=PL1DEQjXG2xnKHKNIRzI4K6oZL-KulU-Vw" frameborder="0" allowfullscreen></iframe>


For a deeper discussion of these topics see [Lambda Expressions Generics and BindValue](lambda-expressions-generics-and-bindvalue.html)