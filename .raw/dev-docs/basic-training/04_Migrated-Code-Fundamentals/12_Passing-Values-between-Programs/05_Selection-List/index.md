### Selection List

1.	So far, we have seen how to pass input parameters. For example, when we needed to filter data by a parameter. Sometimes we want to send a parameter that will be updated by the called program. A selection list is a good example of using output parameters.
2.	Create a new UIController named “SelectShipper” in the Training folder.
```csdiff 
public class SelectShipper : UIControllerBase
{

+    public readonly Models.Shippers Shippers = new Models.Shippers();

    public SelectShipper()
    {
+        From = Shippers;
    }
```
3.	Add the following columns to a grid
![Select Shippers Design](Select_Shippers_Design.png)
4.	Now, let’s make this program a selection list:
* In the `OnLoad` method, add `AllowSelect` property and set it to `True`.
```csdiff 
protected override void OnLoad()
{
+   AllowSelect = true;
    View = () => new Views.SelectShipperView(this);
}
```
This is similar to the “Selection Task” setting in Magic, which means that the user can select a row by a double click it or pressing on the Enter key and this will execute the `OnSavingRow` method and then exit.
* In the Run method add a parameter as follows:
```csdiff
- public void Run()
+ public void Run(NumberColumn shipperid)
{
    Execute();
}

```
We are using a "Column" type and not a basic type because we want to update the value of the column object from the calling program.

* Add an auxiliary variable to the class and inside the Run method, assign it with the parameter, as follows:

```csdiff 
public class SelectShipper : UIControllerBase
{

    public readonly Models.Shippers Shippers = new Models.Shippers();
+   NumberColumn _shipperID;
    public SelectShipper()
    {
        From = Shippers;
    }

    public void Run(NumberColumn shipperid)
    {
+       _shipperID = shipperid;
        Execute();
    }
```

We need this variable since we are going to update the selected value in the `OnSavingRow` method and we can’t access the parameter directly from there, **so we need a wider scope variable** which references the same column from the calling program. 
* In the `OnSavingRow`, update the column's value with the selected value:

```csdiff
+ protected override void OnSavingRow()
+ {
+           _shipperID.Value = Shippers.ShipperID;
+ }
```

5.	In “ShowOrders”, add a method which will call the SelectShipper program sending the ShipVia value.
```csdiff 
+ internal void SelectShipper()
+ {
+    new SelectShipper().Run(Orders.ShipVia) ;
+ }
```  
6.	In “ShowOrders” screen, select the ShipVia textbox and open the event list.
7.	Double click the **Expand** event. This event is triggered when the user press the F5 key or when the user double click on the textbox (like zoom in Magic).
8.	From the handler of the Expand event, call to the selection list and provide the  column from the main table :
```csdiff
+  private void txtShipVia_Expand()
+        {
+            _controller.SelectShipper();
+        }
```
9.	Build and run.
10. Exercise: Selection List

