```csdiff
+Handlers.Add(System.Windows.Forms.Keys.F9, HandlerScope.CurrentTaskOnly).Invokes += e =>
{
    Message.ShowWarning("Pressed F9");
};
```