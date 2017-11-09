* Just like before when we discussed `Cached` in the context of another BusinessProcess (see [Introducing Cached](introducing-cached.html)), we can use `Cached` for an inner class.

```csdiff
public class ShowOrdersToDemoInnerClasses : UIControllerBase
{
...
    protected override void OnEnterRow()
    {
-       new GetTotals(this).Run();
+       Cached<GetTotals>().Run();
    }
 ...
}
```
* Note that we don't have to send `this` to the cached method - it is implicit. The `Cached` method knows automatically that if the called constructor requires the parent class, it'll send it `this`
<iframe width="560" height="315" src="https://www.youtube.com/embed/Wh0SuWF2bcw?list=PL1DEQjXG2xnK8xPqBW89oPL6AHonic9Iz" frameborder="0" allowfullscreen></iframe>

