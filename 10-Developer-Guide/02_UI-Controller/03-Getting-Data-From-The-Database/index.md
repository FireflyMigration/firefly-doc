In this article we'll
* Get data from the database 
* Add a grid and display he following columns on it:
  * OrderID
  * OrderDate
  * ShipVia
  * ShipName
  * ShipCity


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
    ...
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/1u67cUCXxE8?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>

---

To use a table from the database first we need to define the Table we are going to use in the class

```csdiff
public readonly Models.Orders MyOrders = new Models.Orders(); 
```

Them we can set the Table as the Main table in our controller by setting the From in the constructor

```csdiff
From = MyOrders;
```

**Designing the View**  
To be able to see the Columns of the table in the designer we need to build the project first
To see the Controls comes from the migrated code - run the 'Setup Toolbox' wizard from the designer:
RightClick on the window
Select setup Toolbox
Click Yes
Visual studio will add all the controls available in the code to the Toolbox  

Drag a Grid to the Designer and place it as you like
To add the columns use the **Column Wizard** by selecting the grid and select the Column wizard option from the small arrow at the right side of the grid

The Column Wizard shows the Controller, the Models and the columns that can be selected to be add to the grid

 




### Things that can go wrong
1. I can't see the Orders table under my controller when using the column wizard:

    a. Did you build the project prior to opening the column wizard?
    b. Is the build successful?
    b. Make sure that the access modifier for the Orders field is `public`
    c. Close and open visual studio.
    5. Close visual studio, buildDebug.bat & open visual studio