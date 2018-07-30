```csdiff
Handlers.Add(Command.Exit).Invokes += e =>
{
+   e.Handled = !Common.ShowYesNoMessageBox("Exit", "Are you sure you want to exit?", false); 
};
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/qOKrRlzzuGY?list=PL1DEQjXG2xnIGbO3DlvFQjv-T0OXM81r-" frameborder="0" allowfullscreen></iframe>