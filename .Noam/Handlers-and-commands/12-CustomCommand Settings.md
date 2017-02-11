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