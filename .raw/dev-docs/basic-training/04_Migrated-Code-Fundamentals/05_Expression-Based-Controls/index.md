# Expression Based Controls
1.	Sometimes we want to put calculated values on the screen. In Magic we used a textbox that was data-binded to an expression. In .NET, an expression is no more than a method that returns a value.
2.	In order to attach an expression (method) to a textbox (or any other control), the method must be public and has a return type which is one of the following: Text, Number, Date, Time or Bool.
3.	In the previous section, we added a method named “IsShipperExist” which return true if the shipper id exists in the shippers table and false if it isn’t. Let’s put the return value of this method on the screen next to the ShipVia value.
4.	First, we need to make this method public, so that it can be accessed from outside the controller class . In this case the method should be accessed by the Form class.
```
public Bool IsShipperExist()
        {
            return Relations[Shippers].RowFound;
        }
```
5.	Next, we need to build and add a textbox next to the ShipVia value to display the method returned value as follows:
    a.	Undock the grid control and make room for a textbox below the grid.
    b.	Drag a Textbox control from the Toolbox and drop it below the ShipVia column.
    c.	Open the quick menu of the new Textbox and change its Data by pressing the three dots button.
    d.	Select the IsShipperExist method.
    e.	Note the method icon and the parentheses in the textbox designer. These are indications that this is a calculated value.
    ![Add the method view designer](Add_method_view_designer.png)
6.	Build and run. 
7.  Run the program and notice how the expression recomputes, as you change the "ShipVia" value and that the Textbox value on the form is changed once you change the "ShipName" value.
8.	Note that the new textbox cannot be parked on since the expression based controls are non-parkable (like in Magic).

9.  Exercise: Expression Based Controls
