# Creating New Types
1.	A data type is a class that represents a piece of information in the application, like OrderID or User Name. Types are called "Models" in Magic.
2.	In a type we can set default values for a column attributes like Format or Caption.
3.	Let's see an example.
4.	In the Types folder, add a new item and select the “Type” template from the “Firefly” category. Set the name of the class to “TerritoryID”.
5.	Review the template and note that by default the type inherits the NumberColumn type. If you need another type like TextColumn or DateColumn, just change the class inheritance accordingly.
6.	Set the Name, Format and Caption in the type constructor and note that from now on, we will use the type whenever we need this column. The Name, Format and Caption will be identical for the entire application.  
```diff
 public class TerritoryID : NumberColumn
    {
        public TerritoryID(string name, string format, string caption) : base(name, format, caption)
        {
        }
-        public TerritoryID(string name, string format) : base(name, format)
+        public TerritoryID(string name, string format) : base(name, format, "Territory ID")
        {
        }
-        public TerritoryID(string name) : base(name)
+        public TerritoryID(string name) : base(name,"10", "Territory ID")
        {
        }
-        public TerritoryID() : base("TerritoryID")
+        public TerritoryID() : base("TerritoryID", "10", "Territory ID")
        {
        }
    }
```

7.	Now, replace the type of the column in the entity class. Notice that you can remove the Name and Format of the column definition in the entity.
  
```diff
public class Territories : Entity
{
    [PrimaryKey]
-   public TextColumn TerritoryID = new TextColumn("TerritoryID", "20", "Territory ID");
+   public Types.TerritoryID TerritoryID = new Types.TerritoryID();
    public TextColumn TerritoryDescription = new TextColumn("TerritoryDescription", "50", "Territory Description");
    public NumberColumn RegionID = new NumberColumn("RegionID", "6") { InputRange="1,2,3,4" };

    public Territories()
        : base("Territories", DataSources.Northwind1)
    {
    }

}
```

Build and run the UIController again and see that it works the same.
8.	Exercise: Creating New Types

