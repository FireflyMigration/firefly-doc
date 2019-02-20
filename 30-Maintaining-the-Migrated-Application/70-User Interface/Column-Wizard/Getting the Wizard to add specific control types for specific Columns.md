```csdiff
public class Products : Entity 
{
    #region Columns
    [PrimaryKey]
    public readonly Types.ProdID ProductID = new Types.ProdID { Caption = "ProductID", Name = "ProductID", Format = "N10", ReadOnlyForExistingRows = true };
    public readonly TextColumn ProductName = new TextColumn("ProductName", "40");
    public readonly NumberColumn SupplierID = new NumberColumn("SupplierID", "N10")
+   {
+       ControlTypeOnGrid = typeof(Shared.Theme.Controls.ComboBox)
+   };
    public readonly NumberColumn CategoryID = new NumberColumn("CategoryID", "N10");
    public readonly TextColumn QuantityPerUnit = new TextColumn("QuantityPerUnit", "20");
    public readonly NumberColumn UnitPrice = new NumberColumn("UnitPrice", "10.3");
...
```

Or in a type
```csdiff
public class SupplierId : NumberColumn
{
    public SupplierId() : base("SupplierId","10")
    {
+       ControlTypeOnGrid = typeof(Shared.Theme.Controls.ComboBox);
    }
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/iyybreFTmuk" frameborder="0" allowfullscreen></iframe>