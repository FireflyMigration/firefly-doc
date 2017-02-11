```csdiff
Handlers.Add(Command.Exit).Invokes += e =>
{
+   e.Handled = !Common.ShowYesNoMessageBox("Exit", "Are you sure you want to exit?", false); 
};
```