# Return a value
1.	A method can return a value. For example, we can add a method named “IsShipperExist” that will return true if the shipper id exists in the shippers table and false if it isn’t. Notice that we need to define a **return type (Bool)** for this method.
```
Bool IsShipperExist()
        {
            return Relations[Shippers].RowFound;
        }
```
2.	Let’s explain this method parts:
    a.	**Return Type (Bool)** – the return type of the method. If a method does not return any value it should be defined with the void return type. 
    b.	**return** – this keyword is used to return a value back to the caller of the method. 
3.	Let’s Use this method in the in our ValidateUserInput method, as follows:
```csdiff 
private void ValidateUserInput()
        {
-            if (!Relations[Shippers].RowFound)
-            {
-                Message.ShowError("Shipper Id Does not exist");
-            }

+            if (!IsShipperExist()) 
+                Message.ShowError("Shipper Id Does not exist");

        }
```

4.	Build and run.
5.	Exercise: Return a Value
