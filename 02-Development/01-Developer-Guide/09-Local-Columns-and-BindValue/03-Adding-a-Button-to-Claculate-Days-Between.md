* Add a new column called DaysBetween, and set it's format to "5CN" - for more info on formating see:[formatting](formatting.html)

```csdiff
public class DemoLocalColumns : UIControllerBase
{
    public readonly DateColumn FromDate = new DateColumn("From Date");
    public readonly DateColumn ToDate = new DateColumn("To Date");
+   public readonly NumberColumn DaysBetween = new NumberColumn("Days Between","5CN");

    public DemoLocalColumns()
    {
    }
  ...
}
```
* Add the "DaysBetween" column to the screen
* Add a button called "Calc Days Between"
* Double click it to handle it's `Click` event
```csdiff
namespace Northwind.Training.SimpleScreen.Views
{
    partial class DemoLocalColumnsView : Shared.Theme.Controls.Form
    {
        DemoLocalColumns _controller;
        public DemoLocalColumnsView(DemoLocalColumns controller)
        {
            _controller = controller;
            InitializeComponent();
        }

        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
+           _controller.DaysBetween.Value = _controller.ToDate - _controller.FromDate;
        }
    }
}
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/mbekDWnVAq8?list=PL1DEQjXG2xnKHKNIRzI4K6oZL-KulU-Vw" frameborder="0" allowfullscreen></iframe>


