Keywords: online, uicontroller, selection, select, zoom, expand, column, type

# Defining the Expand event outside of the controller

<iframe width="560" height="315" src="https://www.youtube.com/embed/lHCkgwszacM?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

There is another way to set a selection list controller - either in a column of an entity or in a type.
This is achieved by registering to the Exand event of that type / column.  
For example, the CustomerID type code looks like this:

```csdiff
using Firefly.Box;
using ENV.Data;
namespace Northwind.Types
{
    /// <summary>Customer ID(T#1)</summary>
    public class CustomerID : TextColumn 
    {
        public CustomerID() : base("Customer ID", "5")
        {
+            Expand += () => Create<Customers.IShowCustomers>().Run(this);
        }
    }
}
```

This way, whenever this type is used in a UIController, the *Expand* (Zoom) will be available to the user.