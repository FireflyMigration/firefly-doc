Keywords:condition
```csdiff
var h = Handlers.Add(System.Windows.Forms.Keys.F10);
h.Invokes += e =>
{
    Message.ShowWarning("Pressed F10");
};
+h.BindEnabled(() => Orders.ShipVia == 3);
```