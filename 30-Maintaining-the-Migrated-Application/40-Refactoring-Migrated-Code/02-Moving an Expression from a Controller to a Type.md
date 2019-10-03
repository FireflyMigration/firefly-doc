
```csdiff
public class Date : DateColumn
{
    public Date() : base("Date")
    {
        DefaultValue = Firefly.Box.Date.Empty;
    }
+   public Text GetDayOfWeek() => u.NDOW(u.DOW(this));
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/DxsfxShjt3o?list=PL1DEQjXG2xnLzvOZZ55WcSSLF8EdrBayZ" frameborder="0" allowfullscreen></iframe>