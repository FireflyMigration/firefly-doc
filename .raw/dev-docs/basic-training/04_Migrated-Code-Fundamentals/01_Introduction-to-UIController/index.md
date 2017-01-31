# Introduction to UIController
UI Controller is a class that controls the UI interaction.  
It is the equivalent to the Online program in the original application.

The video shows how to create a Folder and in it a Simple UIController and how to add the it to the menu, run the application and call the controller.  
In the next session the UIControllel will be explained.  

######  To create a new Folder in the solution explorer:
1. Stand on the Project where you want to create the folder and RightClick
2. Select 'Add' -> 'New Folder'
3. Give it a name
  

###### To create a new UI Controller:
1. In the solution explorer right click on the Folder you would like to add the new UI controller to it
2. Select ‘Add’ -> ‘New item’
3. On the left pane select ‘Templates’
4. From the Templates list select UIController
5. Give it a name and press the Add button



Two classes are automatically created:
The Controller class – where the logic is written
The View class – the design of the screen (the window of the program)
The two classes will be explained in the next session


###### To Add the Controller to the menu:
1. In the Solution explorer go to the Views folder and DbClick on the ApplicationMDI.cs file
2. Click on the Menu bar and give the menu a name
3. Click outside the menu to save it
4. DbClick on the new created entry - a new method is automatically created.
5. Inside the  this method call the Controller by typing 
   new FolderName.[SubFolderName].ClassName().Run()
````
    private void ApplicationMdi_Load(object sender, EventArgs e)
    {
        new Training.SimpleScreen.ShowOrders().Run();
    }
````


## Creating a Simple Screen
1.	Create folder named “Training” in the main project.
>**!!!!add folder gif!!!**

2.	Add a new item and select the UIController template from the firefly category, set the name of the UIController to “ShowOrders”.
>**!!!!add UIController gif!!!**


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


### Setting the Data View
   1. Add the entity definitions and set the From property. 
>**!!!!add entity gif!!!**

```csdiff
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
....