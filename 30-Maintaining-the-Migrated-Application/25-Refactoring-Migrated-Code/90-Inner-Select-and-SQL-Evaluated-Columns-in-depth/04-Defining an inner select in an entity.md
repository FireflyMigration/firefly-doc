Keywords: DbReadOnly

In the `Orders` class in the `Models` namespace
```csdiff
public readonly TextColumn ShipPostalCode = new TextColumn("ShipPostalCode", "10") { NullDisplayText = "" };
public readonly TextColumn ShipCountry = new TextColumn("ShipCountry", "15") { NullDisplayText = "" };
+public readonly NumberColumn TotalQuantity = new NumberColumn(@"isnull((
+Select sum(Quantity)
+From dbo.[Order Details] 
+Where OrderID = Orders.OrderID
+),0)", "5C", "Total Quantity") { DbReadOnly = true};
```

**Remember to set the `DbReadOnly` property, so that this column will only be included in Select statement and will not be included in Update or Insert statements**


<iframe width="560" height="315" src="https://www.youtube.com/embed/z3p8tur0DI8?list=PL1DEQjXG2xnLKpfmZgMwU1b3fUFxCOiQG" frameborder="0" allowfullscreen></iframe>