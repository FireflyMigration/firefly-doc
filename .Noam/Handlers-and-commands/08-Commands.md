```csdiff
+Handlers.Add(Command.Exit).Invokes += e =>
{
    Message.ShowWarning("User is trying to exit");
};
```