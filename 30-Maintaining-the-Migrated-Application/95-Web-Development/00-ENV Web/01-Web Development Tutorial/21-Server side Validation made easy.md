We want to validate the data on the server in `ViewModels\OrdersViewModel.cs`

## Basic Required Validation

```csdiff
protected override void OnSavingRow()
{
    if (Activity == Activities.Insert)
        Orders.OrderID.Value = Orders.Max(Orders.OrderID) + 1;
+   ModelState.Required(Orders.CustomerID);
}
```
## Custom Validation
```csdiff
protected override void OnSavingRow()
{
    if (Activity == Activities.Insert)
        Orders.OrderID.Value = Orders.Max(Orders.OrderID) + 1;
    ModelState.Required(Orders.CustomerID);
+   if (Orders.OrderDate.Year < 1990)
+       ModelState.AddError(Orders.OrderDate, "Invalid Date");
}
```

## Basic exist in table validation

```csdiff
protected override void OnSavingRow()
{
    if (Activity == Activities.Insert)
        Orders.OrderID.Value = Orders.Max(Orders.OrderID) + 1;
    ModelState.Required(Orders.CustomerID);
    if (Orders.OrderDate.Year < 1990)
        ModelState.AddError(Orders.OrderDate, "Invalid Date");
+   ModelState.Exists(Orders.CustomerID, new Northwind.Models.Customers().CustomerID);
}

```
### one more for ShipVia

```csdiff
protected override void OnSavingRow()
{
    if (Activity == Activities.Insert)
        Orders.OrderID.Value = Orders.Max(Orders.OrderID) + 1;
    ModelState.Required(Orders.CustomerID);
    if (Orders.OrderDate.Year < 1990)
        ModelState.AddError(Orders.OrderDate, "Invalid Date");
    ModelState.Exists(Orders.CustomerID, new Northwind.Models.Customers().CustomerID);
+   ModelState.Exists(Orders.ShipVia, new Northwind.Models.Shippers().ShipperID);
}

```

## the User Experiance
![2017 10 15 08H43 25](2017-10-15_08h43_25.gif)
