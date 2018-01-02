keywords: link,relations,condition
# Relations condition

Name in Migrated Code: **Relations**   
Location in Migrated Code: **InitializeDataView**  

![](relationCondition.png)

****
## Example:
```csdiff 
void InitializeDataView()
{
    From = Orders;
            
    Relations.Add(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByPK_Customers);
+   Relations[Customers].BindEnabled(() => Orders.CustomerID != "");
}
```

## See Also

* [Relation Enable](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Relation_Enabled.htm)




