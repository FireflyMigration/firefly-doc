Keywords:wait no, invoke

```csdiff
+Raise(Command.Exit);
```

```csdiff
partial class ShowOrdersView : Shared.Theme.Controls.Form
{
...
    private void button2_Click(object sender, ButtonClickEventArgs e)
    {
+       e.Raise(Command.Exit);
    }

    private void button3_Click(object sender, ButtonClickEventArgs e)
    {
+       e.Raise(Keys.F8);
    }
...
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/NqMTVR6WB1Y?list=PL1DEQjXG2xnIGbO3DlvFQjv-T0OXM81r-" frameborder="0" allowfullscreen></iframe>