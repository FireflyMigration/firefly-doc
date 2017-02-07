keywords: range,filtering data, where
Name in Magic: **Range**  
Name in the Migrated Code **Where.Add Method**
***

The Where.Add method is written at the beginning of the **InitializeDataView Method**, using the Where.Add syntax.

Example:  
````
Where.Add(Orders.OrderId.IsBetween(1,3));
````

Note:   
When the same expression in Magic is used for the Range and for the Init, 
use the BindEqualTo Method instead of the IsEqualTo Method for the range and BindValue Method for the Init.  

````
Where.Add(Orders.OrderId.BindEqualTo(3));
````

Without this, we would have to write the following 2 lines of code:  

````
Columns.Add(Orders.OrderId).BindValue(()=>3); 
Where.Add(Orders.OrderId.IsEqualTo(3));
````