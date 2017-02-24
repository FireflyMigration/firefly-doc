* Use C#6 syntax to write one line methods in one line, and get shorter code

### new way
```csdiff
internal Text GetDayOfWeek() => u.NDOW(u.DOW(Orders.OrderDate));
```


### old way
```csdiff
internal Text GetDayOfWeek()
{
    return u.NDOW(u.DOW(Orders.OrderDate));
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/OxFy2bttqe8?list=PL1DEQjXG2xnKm-XBP3t3KCFZzWMVogMlj" frameborder="0" allowfullscreen></iframe>

