keywords:ConditionalTransaction,ISAMTransaction,TransactionScope,SupportsTransactions

The `TransactionScope` Property controls the timing of when a transaction opens.

**BUT** it actually has two different behaviours controlled by the `ConditionalTransaction` in the `UserSettings` class.

# ConditionalTransaction
Controls if a transaction will be opened according to the `TransactionScope` property, or if there are additional requirements.

In ther ini file, this settings is determined by the poorly named `ISAMTransaction` flag.

When `ISAMTransaction = Y` then `ConditionalTransaction` is set to false and when `ISAMTransaction = N` then `ConditionalTransaction` is set to true.

Unfortunately in most magic applications, this setting is set to N causing a subtle behavior that requires explanation.


## ConditionalTransaction = true (ISAMTransaction = N)
When a controller starts is about to start a transaction according to the `TransactionScope` setting - it'll first check the call stack for an `Entity` that comes from an SQL data source. Only if it finds an `Entity` that comes from an SQL data source - it'll open a transaction, otherwise it'll ignore the `TransactionScope` property - for example if the `Entity` is from an XML or Memory or Btrieve source.

Unfortunately this behavior was the default in magic for most applications and as such is the default behaviour for most migrated applications.

Whe we say "an `Entity` that comes from an SQL data source" this actually depends on the [SupportsTransactions](http://www.fireflymigration.com/reference/html/P_Firefly_Box_Data_DataProvider_IEntityDataProvider_SupportsTransactions.htm) property of the `Entity`'s `DataProvider`

## ConditionalTransaction = false (ISAMTransaction = Y)
A transaction will be started according to the `TransactionScope` property.