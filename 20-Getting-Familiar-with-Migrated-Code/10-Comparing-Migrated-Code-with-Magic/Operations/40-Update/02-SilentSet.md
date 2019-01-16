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

### Where did it come from  
In magic, when you had an online task, the update command on it's own wouldn't be considered a change that causes the record suffix.
Updates that happen in another task, due to parameters being sent, due to update with cancel false - or force update or varset - whould be considered a change and would cause the record suffix.

To properly articualte that in the migrated code any update that happens in a magic online task in: RecordPrefix, Handler and RecordMain are migrated to `SilentSet`