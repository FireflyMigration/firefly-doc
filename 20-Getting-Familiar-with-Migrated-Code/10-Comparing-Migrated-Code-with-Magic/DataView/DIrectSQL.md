keywords: direct sql,dsql, sql
# Direct SQL

Name in Migrated Code: **sqlEntity**  
Location in Migrated Class: **InitializeDataView**  

![](dsql.png)

## Example:

```csdiff
   void InitializeDataView()
   {
       sqlEntity = new DynamicSQLEntity(Shared.DataSources.Northwind1, "select * from customers where customerID=':1'");
       sqlEntity.AddParameter(_parent.CustomerID); //:1;
       sqlEntity.Columns.Add(CustomerID, CompanyName, ContactName, ContactTitle, Address, City, Region, PostalCode, Country, Phone, Fax);
       From = sqlEntity;
   }
```

1) The Main source - **From = sqlEntity;**
2) SQL Command - **new DynamicSQLEntity**
3) Input Arguments- **sqlEntity.AddParameter**
4) Output Arguments - **sqlEntity.Columns.Add**

---
**See Also:**
* [Dynamic SQL Entity](http://doc.fireflymigration.com/dynamic-sql-entity.html)
---