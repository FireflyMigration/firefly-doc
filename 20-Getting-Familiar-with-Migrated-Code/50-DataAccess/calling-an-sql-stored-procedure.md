Here's a code sample of how to call a stored procedure using a DynamicSQLEntity


```csdiff
//create the procedure 
try
{
    Shared.DataSources.Northwind.Execute("create procedure sqlStoredProcedureDemo as begin select orderId,CustomerId from Orders end");
}
catch
{ }

//define the dynamicSQL Entity to use later in the business process
var e = new DynamicSQLEntity(Shared.DataSources.Northwind, "exec sqlStoredProcedureDemo");
var orderId = new NumberColumn();
var customerId = new TextColumn();
e.Columns.Add(orderId, customerId);
var bp = new BusinessProcess { From = e };
bp.ForEachRow(() => {
    Debug.WriteLine(orderId+", "+customerId); ;
});
```