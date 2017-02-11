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