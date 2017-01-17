### Locating a record (StartOnRowWhere)

1.	When we open the selection list, it starts on the first row. It is useful to open the selection list starting on the current value of the parameter.
2.	To do this we can use the StartOnRowWhere.Add method (like locate in Magic), as follows:
```diff
public void Run(NumberColumn shipperid)
{
    _shipperID = shipperid;
+    StartOnRowWhere.Add(Shippers.ShipperID.IsEqualTo(_shipperID));
    Execute();
}
```
3.	Build and run.
4.	To Center the selected row on the screen use the INI option `CenterScreenInOnline = Y`
5.	Exercise: Locating a Record (StartOnRowWhere)

