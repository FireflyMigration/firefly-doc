Here are the steps to follow when duplicating a controller.

Duplicating a simple controller involves two steps:
1. **Duplicate the Controller class**
2. **Rename the new class and it's constructor**

<iframe width="560" height="315" src="https://www.youtube.com/embed/skGhzpQZT1A" frameborder="0" allowfullscreen></iframe>

## Steps Breakdown

### Step 1 - Duplicate Controller the class 

### Step 2 - Rename the new class

Change the class name, in our case from `Totals` to `TotalsNew`

* Don't forget to rename the constructor.

```csdiff
-class Totals : Northwind.BusinessProcessBase 
+class TotalsNew : Northwind.BusinessProcessBase 
{
    ShowOrders _parent;
-   public Totals(ShowOrders parent)
+   public TotalsNew(ShowOrders parent)
    {
        _parent = parent;
        Title = "Totals";
        InitializeDataView();
    }
    ....
```

