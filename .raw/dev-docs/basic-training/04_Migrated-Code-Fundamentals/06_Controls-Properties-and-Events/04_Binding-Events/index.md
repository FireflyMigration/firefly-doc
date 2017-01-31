### Binding Events
1.	Change the ShowOrdersDetails grid property "RowColorStyle" to "ByColumnsAndControls".
2.	Select the “ShipVia” textbox and review its list of properties.
3.	Switch to the event list of the textbox control.
4.	There are a lot of events that starts with “Bind…” such as **“BindBackColor”, “BindForeColor”, “BindVisible”** etc.
5.	Double click on the **BindBackColor** event and see below how to bind the BackColor property of the textbox to an expression as follows:
```
private void txtShipVia_BindBackColor(object sender, ColorBindingEventArgs e)
        {
            if (_controller.IsShipperExist())
                e.Value = Color.Green;
            else
                e.Value = Color.Red;
        }
```
6.	Note the following:
a.	The **_controller** member of the UI class is a reference to the controller class where all the data definitions and logic code is.
b.	The **e.Value** represents the binded property, which in this case is the **BackColor** property of the textbox.
c.	Remember that we need to cover all options, just like in the example above we put an else part to make sure the color will be evaluated for any change.
7.	Build and run.
8.	Notice that the colors of the textbox are according to the value of ShipVia and that when change the value, the color is changed automatically (Recompute of a UI expression).
9.	For coloring the entire row and not just one textbox, you can select all the textboxes (by holding the CTRL key and select them) and then to select the method for handling the **BindBackColor** event of all the textboxes at once.
![BindBackColor for all textboxes](BindBackColor_complete_line.png)

10.	Build and run.
11.	Exercise: Binding Events

