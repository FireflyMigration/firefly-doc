# Creating a Simple Screen
1.	Create folder named “Training” in the main project.

2.	Add a new item and select the UIController template from the firefly category, set the name of the UIController to “ShowOrders”.

3.	Two classes were created: Controller and View.
````
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
+        View = () => new Views.ShowOrdersView(this);
    }
}

````

4.	Review the controller class:
    1. First thing to note is the OnLoad method. In it we are setting the View property with the reference to the actual View of the Controller.
    2. The View property is the connection to the View
    2. The Run method is used to execute the program.

    !!!!!!Adjust for the two videos we created!!!!!!
### Adding the Controller to the Main Menu

1.	Open the ApplicationMdi class and add a new entry under the "Training" menu "Show Orders" to call the new program.
```
private void showOrdersToolStripMenuItem_Click(object sender, EventArgs e)
{
    new Training.ShowOrders().Run();
}
```

2.	Do not worry about the syntax right now. It will be explained later.


### Setting the Data View
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


  2.	Review the form designer, the visual studio toolbox. 
  3. Show the `Setup Toolbox` right click option - to setup the toolbox once and have all the project's controls available for you.
  3.	Notice that you need to build before you can design the form. Whenever the controller code is changed, a build is needed for the form to detect the changes in designer.

### Designing the View
1.	Add a grid to the form, dock it and use the column wizard to add the following columns.
2.	Expand the form width to display the entire grid.
![Designing The Screen](Designing-the-screen.png)

3.	Run the application and edit some data to screen  (Add, Update, Delete)


## things that can go wrong
1. I can't see the Orders table under my controller when using the column wizard:

    a. Did you build the project prior to opening the column wizard?
    b. Is the build successful?
    b. Make sure that the access modifier for the Orders field is `public`?
    c. Close and open visual studio.
    5. Close visual studio, buildDebug.bat & open visual studio