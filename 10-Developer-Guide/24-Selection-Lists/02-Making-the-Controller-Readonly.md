Keywords:online, uicontroller, selection, select, zoom

# Setting the allowed activities of the controller

<iframe width="560" height="315" src="https://www.youtube.com/embed/Dt5P7dBmtSk?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

So now we have a SelectShipper UIController, that will be used as the selection list.
One more thing we need to do is to make sure the user cannot modify / delete / update records.
In order to do that we need to:
1. Set the Activity (initial mode) to *Browse* (Query). The default is *Update* (Modify).
2. Make sure all the other activities are not allowed (using the *Allow* for each activity).

In the code it will look like this:
```csdiff
protected override void OnLoad()
{
+   Activity = Activities.Browse;
+   AllowDelete = false;
+   AllowInsert = false;
+   AllowUpdate = false;
    RowLocking = LockingStrategy.OnRowSaving;
    TransactionScope = TransactionScopes.SaveToDatabase;
    View = () => new Views.ShowOrdersView(this);
}
```

Another option would be to prevent the user from switching activities. This is done using the *AllowActivitySwitch*.
In the code it will look like this:
```csdiff
protected override void OnLoad()
{
    Activity = Activities.Browse;
-   AllowDelete = false;
-   AllowInsert = false;
-   AllowUpdate = false;
+   AllowActivitySwitch = false;
    RowLocking = LockingStrategy.OnRowSaving;
    TransactionScope = TransactionScopes.SaveToDatabase;
    View = () => new Views.ShowOrdersView(this);
}
```
