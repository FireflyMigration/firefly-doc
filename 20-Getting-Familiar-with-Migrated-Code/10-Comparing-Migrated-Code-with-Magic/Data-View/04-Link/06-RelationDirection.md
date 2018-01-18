keywords: link,relations,direction
# Relations condition

Name in Migrated Code: **Reversed**   
Location in Migrated Code: **InitializeDataView**  

![](relationDirective.png)

****
## Example:
```csdiff 
void InitializeDataView()
{
    From = Orders;
            
    Relations.Add(Customers, Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByPK_Customers);
    Relations[Customers].BindEnabled(() => Orders.CustomerID != "");
+   Relations[Customers].OrderBy.Reversed = true;
}
```




