keywords: Update operation, Incremental, Force update, AddDeltaOf, DeltaOf

![Update](Update.png)


### Migrated Code Examples:

**Simple update**
```csdiff
Num1.SilentSet(Num1 + Num2);
```


**Using Force update = Yes**
```csdiff
Num1.Value = 3;
DenyUndoForCurrentRow();
```

**Using Incremental update = Yes**
```csdiff
Num1.AddDeltaOf(() => 5);
```

