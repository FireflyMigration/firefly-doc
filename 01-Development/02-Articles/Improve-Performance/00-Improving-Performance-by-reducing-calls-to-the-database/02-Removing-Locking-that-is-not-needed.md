Locking is overused specifically for Business Process. If you don't absolutely need it - remove it.

The reason you see too much locking in migrated applications is that in magic locking was the default, and also locking was implied when you wanted to update. It's perfectly safe to update without looking in most cases.

This is especially true for application that were migrated from Pervasive to SQL, where the lock only exists for a millisecond and is almost always redundant.

```csdiff
protected override void OnLoad()
    {
-       RowLocking = LockingStrategy.OnRowLoading;
-       TransactionScope = TransactionScopes.Task;
        AllowUserAbort = true;
    }
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/dhVI8T1Lrhw?list=PL1DEQjXG2xnJNtUHwUvmwYKay85F3WYMg" frameborder="0" allowfullscreen></iframe>