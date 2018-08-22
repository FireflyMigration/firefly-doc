Keywords: online, uicontroller, selection, select, zoom

# Using the Exapnd event to call the SelectShippers

<iframe width="560" height="315" src="https://www.youtube.com/embed/cVMOgw0AHRE?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

Calling the SelectShippers controller is done by configuring the *Expand* event of the column on the view:  
1. Park on the Shipper column in the ShowOrders controller and press F4 to display its properties
2. Go to the *Events* tab of the properties and look for the *Expand* event. Double click it will create a method in the code begind the view.
3. In this method call the SelectShippers controller, sending it the appropriate parameter

The code behind the view will look like this:
```csdiff
private void txtShipVia_Expand()
{
    new SelectShippers().Run(_controller.Orders.ShipVia);
}
```

> Once an *_Expand* event is defined, a **Zoom** indication will be shown in the status bar, allowing you to either press F5, double click on the column or click the **Zoom** indication to call the SelectShippers controller.