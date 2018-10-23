# Exercise - Binding Controls result

At item **5** Your **MandatoryTextBox** code behind should look like :
```csdiff
using System.Drawing;
using Firefly.Box.UI;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Shared.Theme.Controls
{

    /// <summary>MandatoryTextBox</summary>
    public partial class MandatoryTextBox : Shared.Theme.Controls.TextBox
    {


        /// <summary>MandatoryTextBox</summary>
        public MandatoryTextBox()
        {
            InitializeComponent();
        }

+       private void MandatoryTextBox_InputValidation()
+       {
+           if (this.Text == "")
+               ENV.Message.ShowError("This a mandatory text box, it cannot be left empty");
+       }
    }
}
```
items 9 to 16 should look like :  
9 :  
![2018-08-27_15h24_16](2018-08-27_15h24_16.png)  
![2018-08-27_15h25_27](2018-08-27_15h25_27.png)  
10 :  
![2018-08-27_15h19_37](2018-08-27_15h19_37.png)   
11 :  
![2018-08-27_15h27_17](2018-08-27_15h27_17.png)  
12 :  
![2018-08-27_15h29_00](2018-08-27_15h29_00.png)  
13:  
![2018-08-27_15h30_04](2018-08-27_15h30_04.png)  
14 :  
![2018-08-27_15h31_30](2018-08-27_15h31_30.png)  
![2018-08-27_15h32_20](2018-08-27_15h32_20.png)  
15 :  
![2018-08-27_15h33_29](2018-08-27_15h33_29.png)
16 :  
![2018-08-27_15h34_25](2018-08-27_15h34_25.png) 