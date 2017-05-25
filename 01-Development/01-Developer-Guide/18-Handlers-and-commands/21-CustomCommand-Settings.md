Keywords:forceExit, saving a row before a handlers

```csdiff
public class ShowOrders : UIControllerBase
{
    public readonly CustomCommand ShowOrderDetailsCommand = new CustomCommand()
+   {
+       Shortcut = System.Windows.Forms.Keys.F7,
+       Precondition = CustomCommandPrecondition.LeaveRow
+   };

```

<iframe width="560" height="315" src="https://www.youtube.com/embed/yZ3lVRF58QQ?list=PL1DEQjXG2xnIGbO3DlvFQjv-T0OXM81r-" frameborder="0" allowfullscreen></iframe>