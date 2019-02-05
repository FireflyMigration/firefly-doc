keywords:batch,Lifecycle,life cycle, life-cycle,Break,BreakPoint, Break Point, Watch, Watch Window, Output window
## Business Process Life-Cycle
* Review the BusinessProcess Life-Cycle - make the following changes:
```csdiff
public GetOrderStatistics()
{
+   Debug.WriteLine("Constructor");
    From = Order_Details;
}
public void Run()
{
+   Debug.WriteLine("Before the Execute");
    Execute();
+   Debug.WriteLine("After the Execute");
}

```
* Add code for all the controller life cycle events (just copy)
```csdiff
protected override void OnLoad()
{
    Debug.WriteLine("\tOnLoad");
}
protected override void OnStart()
{
    Debug.WriteLine("\t\tOnStart");
}
protected override void OnEnterRow()
{
    Debug.WriteLine("\t\t\tOnEnterRow");
}
protected override void OnLeaveRow()
{
    Debug.WriteLine("\t\t\tOnLeaveRow");
}
protected override void OnSavingRow()
{
    Debug.WriteLine("\t\t\tOnSavingRow");
}
protected override void OnEnd()
{
    Debug.WriteLine("\t\tOnEnd");
}
protected override void OnUnLoad()
{
    Debug.WriteLine("\tOnUnLoad");
}
```
* Run the code and review the output in Visual Studio "Output" window 
* Change the `OnEnterRow` method to reflect the values of the OrderID and the ProductID
```csdiff
protected override void OnEnterRow()
{
+   Debug.WriteLine("\t\t\tOnEnterRow Order:" + Order_Details.OrderID + " Product:" + Order_Details.ProductID);
}
```
* Run the code and review the output in Visual Studio "Output" window 
<iframe width="560" height="315" src="https://www.youtube.com/embed/7lcdz6ACF8o?list=PL1DEQjXG2xnKS0Zo7h-PrExXZ18hGxhvA" frameborder="0" allowfullscreen></iframe>


