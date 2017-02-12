keywords:online 
# Creating a Simple Screen


To create a new UI Controller:
1. In the solution explorer right click on the Folder you would like to add the new UI controller to it
2. Select ‘Add’ -> ‘New item’
3. On the left pane select ‘Templates’
4. From the Templates list select UIController
5. Give it a name and press the Add button


Two classes are automatically created:
1. The Controller class – where the logic is written
2. The View class – the design of the screen (the window of the program)


**The Controller class:**

````csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Training.SimpleScreen
{
    public class ShowOrders : UIControllerBase
    {

        public ShowOrders()
        {

        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowOrdersView(this);
        }
    }
}

````


1. The **using** statements at the top.  
   The dll are not being in used yet, you may use them later and that is why they are greyed.
2. **namespace** definition - `namespace Northwind.Training.SimpleScreen`
   The name space represents the position of the class in the solution
   In this case the UIController is under 'SimpleScreen' folder which defined under 'Training' folder under the 'Northwind' solution. 
3. **class** definition: ```` public class ShowOrders : UIControllerBase````   
   This is a public class called ShowOrders which inherits from UIControllerBase class,  
   meaning the ShowOrders class receives the capabilities of the UIController class. 
4. The **Constructor** : ```` public ShowOrders() ````
5. The **Run** method : ```` public void Run() ```` that calls the ````Execute()```` method which actually executes the UIController
6. Override **OnLoad** method which overrides the basic implementation of OnLoad method which declared in the UIControllerBase class: 
7. **View** - in the OnLoad() method the view property of the UIController is set
````csdiff
    protected override void OnLoad()
    {
         View = () => new Views.ShowOrdersView(this);
    }
```` 


**The View class:**

````csdiff
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Firefly.Box;
using Firefly.Box.UI.Advanced;
using ENV;
using ENV.Data;

namespace Northwind.Training.SimpleScreen.Views
{
    partial class ShowOrdersView : Shared.Theme.Controls.Form
    {
        ShowOrders _controller;
        public ShowOrdersView(ShowOrders controller)
        {
            _controller = controller;
            InitializeComponent();
        }
    }
}
```` 


1. The **using** statements at the top.
2. **namespace** definition - ```` namespace Northwind.Training.SimpleScreen.Views````   
   The view has the .Views at the end as it is defined under the Views folder
3. **class** definition - ```` partial class ShowOrdersView : Shared.Theme.Controls.Form````   
   This class inherits from ````Form```` class. This inheritance sets the visual designer capability to the View of the ShowOrders class.
4. **Constructor** - ```` public ShowOrdersView(ShowOrders controller)```` 
5. **Controller parameter** - the View class receive the controller as parameter and saves it to a local class variable called '_controller'
6. After updating the local variable _controller with the parameter ```` _controller = controller;  ```` the constructor calls the ```` InitializeComponent();```` method
7. The InitializeComponent() method defined in the code of the designer which is automatically created by Visual Studio.  



<iframe width="560" height="315" src="https://www.youtube.com/embed/DzEjXid8mSc?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>