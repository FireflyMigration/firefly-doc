keywords: Any Error, Locked Row, Duplicate Index, Constraint failure, Trigger failure, Record has been updated, Record changed by antoher user, Insert/Update/Delete failure, Unmapped errors, As strategy, Abort Task, Rollback and restart, Auto retry, User retry, Ignore, Task, Subtree, AllErrors, LockedRow, DuplicateIndex, ConstraintFailed, TriggerFailed, RowWasChangedSinceLoaded, UpdatedRowWasChangedSinceLoaded, DataChangedFailed, UnknownErrr, Deadlock, FailedToInitializeEntity, InvalidSQLStatement, NullInOnlyOnePartOfDateTimePair, ReadOnlyEntityUpdate, RowDoesNotExist, TransactionRolledBack, Default, AbortTask, RollbackAndRecover, Retry, Ignore, AbortAllTasks, Rollback, Throw, CurrentTaskOnly, CurrentContext, UnhandledCustomCommandInModule, DatabaseErrorType, DatabaseErrorHandlingStrategy, HandlerScope

In Magic you have the option to trap database errors by an error event in order to handle the eror in a different way or register the error. In Firefly these are called database error handlers.
See also: http://doc.fireflymigration.com/database-error-handling-with-transaction-stack-and-scope.html for more information on how you can adjust the error handling in Firefly yourself.

Add the following 'using' to your program (if not already present):
```csdiff
using Firefly.Box.Data.DataProvider;
```

And if also not already present add:
```csdiff
	InitializeHandlers();
```

Sample code on how to add a error handler:
```csdiff
void InitializeHandlers()
{
    Handlers.AddDatabaseErrorHandler(DatabaseErrorType.RowWasChangedSinceLoaded, HandlerScope.CurrentContext).Invokes += e =>
    #region
    {
        e.HandlingStrategy = DatabaseErrorHandlingStrategy.Ignore;
        Common.ShowDatabaseErrorMessage = false;
        e.Handled = true;
    };
    #endregion
}
```

### Firefly error handlers
The error trapping options are (Magic compared to Firefly):

### DatabaseErrorType

|#| Error:| Val | DatabaseErrorType | Remark |
| | :--- | :--- | :--- | :--- |
|1| Any Error | 0 | AllErrors |	Represents any and all errors |
|2| Locked Row | 3 | LockedRow | An attempt to lock a row failed because the row is already locked by another session |
|3| Duplicate index | 2 | DuplicateIndex | Occurs when values are updated or inserted to the database, and a unique contraint in the database is violated |
|4| Constraint failure | 5 | ConstraintFailed | |
|5| Trigger failure | 10 | TriggerFailed | |
|6| Record has been updated | 7 | RowWasChangedSinceLoaded | |
|7| Record changed by another user | 14 | UpdatedRowWasChangedSinceLoaded | |
|8| Insert/Update/Delete failure | 4 | DataChangedFailed | An attempt to perform update, insert or delete failed for an unspecified reason |
|9| Unmapped errors | 1 | UnknownError | An error that is not specificly defined |
|-| | 8 | Deadlock | |
|-| | 12 | FailedToInitializeEntity | |
|-| | 13 | InvalidSQLStatement | |
|-| | 11 | NullInOnlyOnePartOfDateTimePair | |
|-| | 9 | ReadOnlyEntityUpdate | |
|-| | 6 | RowDoesNotExist | <This handler is automatically added during migration if 'Unmapped error' is used in Magic> |
|-| | 15 | TransactionRolledBack | |

### DatabaseErrorHandlingStrategy

| Dir: | Val | DatabaseErrorHandlingStrategy | Remark |
| :--- | :--- | :--- | :--- |
| As strategy | 1 | Default | The default behaviour of the error |
| Abort Task | 7 | AbortTask | The current task will close |
| Rollback and restart | 3 | RollbackAndRecover | The transaction will be rolled back, and the task that started the transaction will try to recover according to the UIController.OnDatabaseErrorRetry property |
| Auto retry | 2 | Retry | The operation will be retried |
| User retry | 1 | Default | <This options is not implemented yet because it has not been used so far> |		
| Ignore | 0 | Ignore | Ignore the error, and try to process |
| - | 6 | AbortAllTasks | All open tasks will be closed |
| - | 4 | Rollback | The transaction will be rolled back, and the task that started the transaction will be terminated |
| - | 5 | Throw | The exception will be thrown and the transaction will be rolled back |

### HandlerScope

| Scope: | Val | HandlerScope | Remark |
| :--- | :--- | :--- | :--- |
| Task | 0 | CurrentTaskOnly | Only commands invoked by the currrent task are handled |
| Subtree | 1 | CurrentContext (=Default) | Any comand invoked by the current task, or commands that were invoked by tasks that were called by the current task |
| - | 2 | UnhandledCustomCommandInModule | Relevant for handlers that reside in a task that inherits from ModuleController |

Contributor: Harry Kleinsmit.