keywords: why we don't use select for update, sp_getapplock, sp_releaseapplock

Btrieve and SQL Server have fundamental differences in the way they manage locks.

When we migrate an application from btrieve to SQL it is crucial to maintain the exact same locking and transaction behavior that existed in Btrieve - in the migrated SQL application.

## Locking
In Btrieve an row can be locked even if there is no active transaction. That lock exists while the controller is parked on a row and is released when the controller moves to the next row (After OnSavingRow).

### The Challange with SQL Server
The SQL Server `select ... with (UPDLOCK,NOWAIT)` works differently from the locking strategy used by Btrieve.

A `select ... with (UPDLOCK,NOWAIT)` can only exist when a transaction is open - and that lock is only released when the transaction is either committed or released.
This causes huge problems for application that were migrated from Btrieve to SQL in the past - it had two undesired outcomes.
1. Loss of data - Most Btrieve applications did not use Transactions, and even if they did - they had to extend the transaction to cover all locking scenarios, resulting in long transactions that either succeeded or rolled back all together. Users will usually report that they worked all day and nothing was saved - that's because the transaction was still open and the application crashed or rolled back the transaction and nothing was saved.
2. Many many locked row errors - since in Btrieve a Lock had a short life span (from lock start, until you leave that row) developers didn't always pay enough attention to their locking. Previously, after they migrated to SQL that lock would extend all the way until the transaction is committed or rolled back - causing users the get a "Locked Row" error more frequently

### The Solution
To achieve the exact same Locking behavior in SQL Server that existed in the Btrieve application we used two SQL Server native locking stored procedures, [sp_getapplock](https://docs.microsoft.com/en-us/sql/relational-databases/system-stored-procedures/sp-getapplock-transact-sql) and [sp_releaseapplock](https://docs.microsoft.com/en-us/sql/relational-databases/system-stored-procedures/sp-releaseapplock-transact-sql).
These stored procedures gives us full control of the locking scope and can lock outside transactions.

So whenever the application issues a lock - instead of using the `select ... with (UPDLOCK,NOWAIT)` syntax, we call the `sp_getapplock` stored procedure with a unique key that represents the table and primary key.
If any other session will call `sp_getapplock` with the same key, it'll get a locked row error.

Once the controller leaves the row, we call the `sp_releaseapplock` with the same key to release the lock.

We encourage customers after the migration to reduce the locks in their application, since in a `BusinessProcess` locks cause more database interactions, and since in a `BusinessProcess` the locks exists for a short period of time (milliseconds) it may make sense to remove them all together.

Here's an article on how to do so:
[removing-locking-that-is-not-needed.html](removing-locking-that-is-not-needed.html)

## Transactions
Most customers using Btrieve did not use Transactions.
That setting is controlled by the `ISAMTransaction` setting in the ini file.

The SQL version of these application uses the `NoTransactionEntityDataProvider` class which ignores any transaction setting at the `Controller` level for Entities that were migrated from Btrieve to SQL.

For customers that did use transactions in Btrieve, (`ISAMTransaction = Y`) we provide an identical locking and transaction behavior.

When using Transactions in btrieve, locking that was caused by an actual update command remained until the transaction was committed or rolled back (in btrieve).

To maintain that behavior in accordance with the `sp_getapplock` strategy, another call to `sp_getapplock` will happen before each `Update` that happens as part of a transaction with a setting to release automatically once the transaction is committed or rolled back.
