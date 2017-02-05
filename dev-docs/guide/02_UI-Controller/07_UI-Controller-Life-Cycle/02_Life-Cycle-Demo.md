# UI Controller - Life Cycle Demo

```csdiff
public void Run()
{
    Debug.WriteLine("Before the Execute");
    Execute();
    Debug.WriteLine("After the Execute");
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
protected override void OnUnLoad()
{
    Debug.WriteLine("\tOnUnLoad");
}
protected override void OnEnd()
{
    Debug.WriteLine("\t\tOnEnd");
}

protected override void OnLoad()
{
    Debug.WriteLine("\tOnLoad");
    View = () => new Views.ShowOrdersView(this);
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/X4fP8lxqhEs?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>