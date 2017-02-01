# Simple Method

1.	A method is a named block of code, which enables us to organize the code into small reusable parts.
2.	For example, we may want to put all our input validation code in a separate method. We can use the Extract Method option of Visual Studio to help us do it as follows:
![Extract the method](extract_method.png)
3.	And move the code to a new method named “ValidateUserInput”:

```csdiff
 protected override void OnSavingRow()
        {
+           ValidateUserInput();
        }

+        private void ValidateUserInput()
        {
            if (Orders.ShipName == "")
            {

                Message.ShowError("Please enter a ship name");
            }

            if (u.InStr(Orders.ShipName, "@") > 0)
            {
                Message.ShowError("The '@' sign is not allowed in the ship name field");
            }

            if (!Relations[Shippers].RowFound)
            {
                Message.ShowError("Shipper Id Does not exist");
            }
        }
```
4.	Exercise: Simple Method

