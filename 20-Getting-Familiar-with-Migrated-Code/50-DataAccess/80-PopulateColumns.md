In Entities that have more than 50 columns you'll find the following code:
```csdiff

/// <summary>Manualy attaches the columns to the entity. Used in tables with a lot of columns</summary>
protected override void PopulateColumns()
{
    Columns.Add(...
}
```

It is added to these entities due to performance considerations.

**For such entities, if you add a column you should also include it in `Columns.Add` call.**

# Why is it there?
A column must be associated with an Entity to be considered and Entity Column and to be used in data related operations (select, update etc...)

Normally (For entities with 50 columns or less) the columns are associated with the Entity using an .NET mechanism called reflection.

For Example - if we have the following Entity:
```csdiff
public class Customers : Entity
{
    public NumberColumn Code = new NumberColumn("Code");
    public TextColumn CustomerName = new TextColumn("Customer Name");
    public Customers() : base("Customers", Shared.DataSources.Northwind)
    {
    }
}
```

The default implementation of `PopulateColumns` (that is if you don't override it) will use reflection to figure out the columns in this class and automatically add the column to the column collection, using `Columns.Add`

This "reflection" operation comes at a small cost. We found that in entities that have many columns this cost is too high (it's milliseconds but still) so we decided that entities that have more than 50 columns, will not use the "reflection" for populating the columns, instead for such entities the migrated code will generate the `Columns.Add` call instead - we do that call in the override of `PopulateColumns` where we "override" the default automatic reflection based mechanism with a manual one that is faster to execute.

## What do I need to remember from this article
If you have a Entity that has `PopulateColumns` and you are adding a column to it - make sore to add the new column to the `Columns.Add` call.