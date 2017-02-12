Keywords:condition
```csdiff
var h = Handlers.Add(System.Windows.Forms.Keys.F10);
h.Invokes += e =>
{
    Message.ShowWarning("Pressed F10");
};
+h.BindEnabled(() => Orders.ShipVia == 3);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/gFWRbwn-ZgM?list=PL1DEQjXG2xnIGbO3DlvFQjv-T0OXM81r-" frameborder="0" allowfullscreen></iframe>