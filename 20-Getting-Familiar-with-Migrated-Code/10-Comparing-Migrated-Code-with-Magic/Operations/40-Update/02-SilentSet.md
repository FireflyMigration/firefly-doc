keywords: Update operation, ForceUpdate, Undo

### SilentSet

SilentSet is an update that doesn't force the OnSavingRow
(does not mark the row as changed).

If the SilentSet is the only change to the row, nothing will be saved.   
However, if the SilentSet is done together with another regular update of any other column, both changes will be saved.

### Migrated Code Examples:
```csdiff
TableA.Name1.SilentSet("new name");
```
