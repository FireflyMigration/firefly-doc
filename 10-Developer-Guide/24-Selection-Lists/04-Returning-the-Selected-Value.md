Keywords:online, uicontroller, selection, select, zoom

# Returning the selected value

<iframe width="560" height="315" src="https://www.youtube.com/embed/fvazOqYXmV4?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

Naturally a selection list receives an incoming parameter (the column that should be updated) and is updates it upon selecting a new value.

So in the code we need to have:
1. A parameter in the Run method the is both received and updated. In this case a NumberColumn
2. Another member with the same type as the parameter, that is available to all the class and not just the Run method.
This member will later be updated with the selected value.
> This member will have the pointer to the parameter, so whenever we update it, we actually updating the parameter as well.  

3. Update the member with the current row in the OnSavingRow.

So the code will look like this:
```csdiff
+   internal NumberColumn _ShipperID = new NumberColumn();

-public void Run()
+public void Run(NumberColumn shipperID)
{
+    _shipperID = shipperID;
    Execute();
}
+protected override void OnSavingRow()
+{
+    _shipperID.Value = Shippers.ShipperID;
+}

```

