keywords: init,Bindvalue,BindEqualTo
Name in Magic: **Init**  
Name in the Migrated Code **BindValue Method**
***

Example:  

````
v_RowTotal.BindValue(() => Orders.UnitPrice * Orders.Quantity - Orders.Discount);
````

Note:   
When the same expression in Magic is used for the Range and for the Init, 
use the BindEqualTo Method instead of the IsEqualTo Method for the range and BindValue Method for the Init.  

````
Where.Add(Orders.OrderId.BindEqualTo(3));
````

Without this, we would have to write the following 2 lines of code:  

````
Where.Add(Orders.OrderId.IsEqualTo(3));
Orders.OrderId.BindValue(()=>3); 
````