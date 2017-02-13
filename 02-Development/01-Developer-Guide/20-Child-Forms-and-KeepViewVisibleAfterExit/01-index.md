```csdiff
public class ShowOrderDetails : UIControllerBase
{
...
    protected override void OnLoad()
    {
+       KeepViewVisibleAfterExit = true;
        View = () => new Views.ShowOrderDetailsView(this);
    }
...
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/3GIAa2peS_Q?list=PL1DEQjXG2xnKZADlPXY_P61ujx3lGsP6m" frameborder="0" allowfullscreen></iframe>