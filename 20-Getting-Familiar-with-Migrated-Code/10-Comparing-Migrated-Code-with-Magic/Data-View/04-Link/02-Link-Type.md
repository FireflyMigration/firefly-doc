keywords: link,relations  
Name in the Migrated Code: **RelationsType property**  
Location in the Migrated code: **Sent as parameter to the Relations.Add()** method

****

The Relation type in the migrated code is sent as parameter to the Relations.Add() method.
For example:  

```csdiff
   void InitializeDataView()
   {
     From = Orders;
     Relations.Add(Customers, RelationType.Find, Customers.CustomerID.IsEqualTo(Orders.CustomerID);
   }
```



The following table shows the .Net equivalents for Magic link types.

| Magic Name | Migrated Code Name |
|------------|--------------------|
| Query      | Find               |
| Write      | InsertIfNotFound   |
| Create     | Insert             |
| InnerJoin  | InnerJoin          |
| L.O.Join   | Join               |

```
```
See also:  
[Relations Enum](http://www.fireflymigration.com/reference/html/T_Firefly_Box_RelationType.htm) 
