keywords: link,relations  

# Locate

Name in the Migrated Code: **RelationsType property**  
Location in the Migrated code: **Sent as parameter to the Relations.Add()** method
****

The Locate expression for the relation is sent as parameter to the Relations.Add() method.  
For each locate value, the migrated code will show an expression.   
For example:  


```csdiff

void InitializeDataView()
{
   Relations.Add(Customers, RelationType.Find, 
+             Customers.CustomerID.IsEqualTo(Orders.CustomerID).And
+              Customers.City.IsequalTo("Madrid");
}
```

The above code has locate on 2 fields.  
