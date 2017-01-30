### InputValidation Event
1.	Select the “txtShipVia” text box control.
2.	Use the **InputValidation** event (Double-Click) to check if the shipper id exists in the shippers table, as follows:
```csdiff
private void txtShipVia_InputValidation()
{
    if (!_controller.IsShipperExist())
    {
        ENV.Message.ShowError("Shipper ID does not exist");
    }
}
```
3.	Build and run.
4.	Notice that unlike the validation In the OnSavingRow, the **InputValidation** event occurs when the user leaves the field, so it can be used to prevent the user from leaving (by calling to the Message.ShowError method).
5.	The logic code above should be in the controller class rather than the UI class (Code behind the form designer), so we are going to move the validation to a new method in the controller class.
6.	Move to logic code from the UI to the controller class as follows:
    
    a.UI Class

```csdiff
private void txtShipVia_InputValidation()
{
-            if (!_controller.IsShipperExist())
-            {
-                ENV.Message.ShowError("Shipper ID does not exist");
-            }
+            _controller.ValidateShipperID();
}
```
     b.Controller Class

```csdiff 
internal void ValidateShipperID()
{
    if (!IsShipperExist())
        Message.ShowError("Shipper Id Does not exist");
}
```    
7.	Build and run. 
8.	Exercise: InputValidation Event

