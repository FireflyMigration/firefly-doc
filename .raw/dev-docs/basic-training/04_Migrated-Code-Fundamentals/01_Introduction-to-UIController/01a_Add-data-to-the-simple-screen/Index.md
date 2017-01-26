
# Display Data from database 
   




   1. Add the entity definitions and set the From property. 


```diff
public class ShowOrders : UIControllerBase
{
+   public readonly Models.Orders Orders = new Models.Orders();
    public ShowOrders()
    {
+       From = Orders;
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
```

>Do not worry about the syntax right now. It will be explained later.


  2.	Review the form designer, the visual studio toolbox and the Firefly toolbox. 
  3.	Notice that you need to build before you can design the form. Whenever the controller code is changed, a build is needed for the form to detect the changes in designer.

### Designing the View
1.	Add a grid to the form, dock it and use the column wizard to add the following columns.
2.	Expand the form width to display the entire grid.
![Designing The Screen](Designing-the-screen.png)

### Adding the Controller to the Main Menu

1.	Open the ApplicationMdi class and add a new entry under the "Training" menu "Show Orders" to call the new program.
```
private void showOrdersToolStripMenuItem_Click(object sender, EventArgs e)
{
    new Training.ShowOrders().Run();
}
```

2.	Do not worry about the syntax right now. It will be explained later.
3.	Run the application and edit some data to screen  (Add, Update, Delete)
