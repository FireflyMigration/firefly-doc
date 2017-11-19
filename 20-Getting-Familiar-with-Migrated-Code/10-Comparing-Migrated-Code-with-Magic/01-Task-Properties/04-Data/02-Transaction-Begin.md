keywords: Task Properties, Data Tab, Transaction Begin

Name in Migrated Code: **Transaction Scope**  
Location in Migrated Code: **OnLoad Method**  

![](2017-11-15_15h44_04.png) 

## Migrated Code Eample 

```csdiff
TransactionScope = TransactionScopes.RowLocking; 
```

## Property Values 

| Magic Name          | Migrated Code Name |
|---------------------|--------------------|
| Before Task Prefix  | Task               |
| OnRecordLock        | RowLocking         |
| BeforeRecordPrefix  | Row                |
| BeforeRecordSuffix  | LeaveRow           | 
| Before Record Update| SaveToDataBase     | 
| None                | None               | 
| Group               | Group              | 

## Note
The Group option is only applicable for BusinessProcess. The migrated code will not write the `TransactionScope` property if no transaction is required.
The `TransactionScope` property will be written whenever a transaction was set - even if it was the default in magic. 
It does that to explicitly indicate that there is a transaction.

## See Also: 
* [UIController TransactionScope Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_TransactionScope.htm) 
* [BusinessProcess TransactionScope Property](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_TransactionScope.htm) 
* [TransactionScope Enum](http://fireflymigration.com/reference/html/T_Firefly_Box_TransactionScopes.htm) 
