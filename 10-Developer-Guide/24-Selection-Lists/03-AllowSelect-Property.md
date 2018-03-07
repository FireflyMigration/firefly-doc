Keywords:online, uicontroller, selection, select, zoom

# The AllowSelect property

<iframe width="560" height="315" src="https://www.youtube.com/embed/3kE5eL8cSWM?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

We need to indicate to the controller that it will be used as a selection list controller. This is done using teh *AllowSelect* property.

```csdiff
protected override void OnLoad()
{
    Activity = Activities.Browse;
    AllowDelete = false;
    AllowInsert = false;
    AllowUpdate = false;
+   AllowSelect = true;
    RowLocking = LockingStrategy.OnRowSaving;
    TransactionScope = TransactionScopes.SaveToDatabase;
    View = () => new Views.ShowOrdersView(this);
}
```

This will trigger the *OnSavingRow* and end the controller execution whenever the user:
1. Presses Enter
2. Double Click the row
3. Triggers the *Select* command