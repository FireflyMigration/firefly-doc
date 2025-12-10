keywords: link,relations,condition,reversed
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
+   Relations[Customers].OrderBy.Reversed = true;
}
```

## See Also

* [Relation Enable](/reference/html/P_Firefly_Box_Relation_Enabled.htm)




