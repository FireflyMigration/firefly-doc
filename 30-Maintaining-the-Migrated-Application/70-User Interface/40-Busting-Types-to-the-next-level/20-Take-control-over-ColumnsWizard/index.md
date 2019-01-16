

We start by setting up our form object the root of all forms:
![10](10.png)

We will override the 'AfterWizardAddedControl' method

```csdiff
using Firefly.Box.Data.Advanced;
using Firefly.Box.UI;
using Firefly.Box.UI.Advanced;

namespace Northwind.Shared.Theme.Controls
{
    public partial class Form : ENV.UI.Form 
    {
        /// <summary>Form</summary>
        public Form()
        {
            Icon = ENV.Common.DefaultIcon;
            DefaultLabelType = typeof(Label);
            DefaultTextBoxType = typeof(TextBox);
            InitializeComponent();
        }
+       public override void AfterWizardAddedControl(Firefly.Box.UI.Label label, InputControlBase control, ColumnBase column)
+       {
+           base.AfterWizardAddedControl(label, control, column);
+       }
    }
}
```

This method allow us to take more control on how the items we are adding to the form are going to look or behave:
I.E. If I will like all labels to have a suffix of ':' , I can add that here:

```csdiff
using Firefly.Box.Data.Advanced;
using Firefly.Box.UI;
using Firefly.Box.UI.Advanced;

namespace Northwind.Shared.Theme.Controls
{
    public partial class Form : ENV.UI.Form 
    {
        /// <summary>Form</summary>
        public Form()
        {
            Icon = ENV.Common.DefaultIcon;
            DefaultLabelType = typeof(Label);
            DefaultTextBoxType = typeof(TextBox);
            InitializeComponent();
        }
        public override void AfterWizardAddedControl(Firefly.Box.UI.Label label, InputControlBase control, ColumnBase column)
        {
+           label.Text += " :";
            base.AfterWizardAddedControl(label, control, column);
        }
    }
}
```

Now when I use the columnWizard to add columns the end result will be:
![20](20.png)

![30](30.png)
