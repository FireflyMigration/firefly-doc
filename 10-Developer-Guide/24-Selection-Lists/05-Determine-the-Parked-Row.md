Keywords: online, uicontroller, selection, select, zoom

# Determine the parked row

<iframe width="560" height="315" src="https://www.youtube.com/embed/89HADtTSQ4U?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

Now that we have a functioning selection list controller, there is one more thing we need to add to it - the parked row.  
Keeping in mind that in most cases we call this controller when parked on a record containing a value - so natually we would like the controller to being by parking on the relevant row.
This is done using the *StartOnRowWhere.Add* indicating, like we did in the *Where.Add* the criteria (or values) that will determing the parked row.

This is how it is done in the code:
```csdiff
public void Run(NumberColumn shipperID)
{
    _shipperID = shipperID;
+   StartOnRowWhere.Add(Shippers.ShipperID.IsEqualTo(shipperID));
    Execute();
}
```