# UI Controller - Life Cycle Demo
In this page we'll
* Add using to `System.Diagnostics`
* Use the Visual Studio `Output` window to show the execution of the controller
* Add `Debug.WriteLine` to the existing Run and OnLoad Methods:
```csdiff
public void Run()
{
+   Debug.WriteLine("Before the Execute");
    Execute();
+   Debug.WriteLine("After the Execute");
}
protected override void OnLoad()
{
+   Debug.WriteLine("\tOnLoad");
    View = () => new Views.ShowOrdersView(this);
}
```
* Add code for all the controller life cycle events (just copy)
```csdiff
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
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/X4fP8lxqhEs?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>