In this article we'll
* Explain that in C#6 Microsoft introduced an easier way of writing a single line method
* Use <kbd>Ctrl</kbd> + <kbd>K</kbd> + <kbd>D</kbd> to automatically format our source code

### new way
```csdiff
bool ShipperDoesNotExist() => !Relations[Shippers].RowFound;
```


### old way
```csdiff
bool ShipperDoesNotExist()
{
    return !Relations[Shippers].RowFound;
}
```
  

<iframe width="560" height="315" src="https://www.youtube.com/embed/pLunmO-QBfI?list=PL1DEQjXG2xnK0hrpTQpa2p8ZvEMPsvh7n" frameborder="0" allowfullscreen></iframe>