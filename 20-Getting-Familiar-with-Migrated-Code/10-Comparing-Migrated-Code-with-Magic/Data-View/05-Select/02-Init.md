keywords: init,Bindvalue,BindEqualTo
Name in Migrated Code: **BindValue**  
Location in Migrated Class: **InitializeDataView**  
***

## Example:

```csdiff
v_RowTotal.BindValue(() => Orders.UnitPrice * Orders.Quantity - Orders.Discount);
````
**See Also:**
* [Local Columns and BindValue](http://doc.fireflymigration.com/local-columns-and-bindvalue.html)


