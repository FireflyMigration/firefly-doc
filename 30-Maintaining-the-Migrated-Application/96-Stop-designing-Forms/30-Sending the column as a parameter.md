keywords: designer, form, view, dynamic, screen

# Sending the column as a parameter

We can use the column we want to add as a parameter to the ```AddColumn``` method.

```csdiff

+using Firefly.Box.Data.Advanced;

partial class ShowView : Shared.Theme.Controls.Form
{
    ShowCustomers _controller;
    public ShowView(ShowCustomers controller)
    {
        _controller = controller;
        InitializeComponent();
-       AddColumn();
+       AddColumn(_controller.Customers.City);
    }

-   void AddColumn()
+   void AddColumn(ColumnBase colToAdd)
    {
-       var gcCity = new Shared.Theme.Controls.GridColumn() { Text = "City" };
+       var gcCity = new Shared.Theme.Controls.GridColumn() { Text = colToAdd.Caption };
        var tbCity = new Shared.Theme.Controls.TextBox() { Style = Firefly.Box.UI.ControlStyle.Flat };
-       tbCity.Data = _controller.Customers.City;
+       tbCity.Data = colToAdd;
        gcCity.Controls.Add(tbCity);
        grid1.Controls.Add(gcCity);
    }
}
```

The next article will use the ```AddColumn``` method to add all the columns in the entity.