Here are the steps to follow when duplicating a controller.

Duplicating a controller with a view involves the following steps:
1. **Duplicate the class**
2. **Rename the new class and it's constructor**
3. **Fix the references in the inner Controllers (child controllers)**
4. **If it has a View**  
4.1. **Duplicate the View class**  
4.2. **Rename the new View class, it's constructor and it's designer class**  
4.3. **Fix the references between the View and the Controller**  
5. **For any of the inner Controllers views**  
5.1 **Duplicate the inner Controller's View**  
5.2. **Rename the new View class, it's constructor and it's designer class**  
5.3. **Fix the references between the View and the Controller**


<iframe width="560" height="315" src="https://www.youtube.com/embed/D3JMAzqfrpk" frameborder="0" allowfullscreen></iframe>


## Steps Breakdown

### Step 1 - Duplicate the class 

### Step 2 - Rename the new class

Change the class name, in our case from `ShowOrders` to `ShowOrdersCopy`

* Don't forgen to rename the constructor.

```csdiff
- public class ShowOrders : Northwind.FlowUIControllerBase,IShowOrders 
+ public class ShowOrdersCopy : Northwind.FlowUIControllerBase,IShowOrders 
 {
-    public ShowOrders()
+    public ShowOrdersCopy()
    {
        Title = "Show Orders";
        InitializeDataViewAndUserFlow();
        InitializeHandlers();
    }
```
### Step 3 - Fix the references in the inner Controllers (child controllers)
**Details inner Controller**
```csdiff
/// <summary>Details(P#5.1)</summary>
/// <remark>Last change before Migration: 02/01/2008 09:11:36</remark>
internal class Details : Northwind.UIControllerBase 
{
-   ShowOrders _parent;
+   ShowOrdersCopy _parent;
-   public Details(ShowOrders parent)
+   public Details(ShowOrdersCopy parent)
    {
        _parent = parent;
        Title = "Details";
        InitializeDataView();
        InitializeHandlers();
    }
```
**Totals inner Controller**
```csdiff
/// <summary>Totals(P#5.2)</summary>
/// <remark>Last change before Migration: 11/04/2007 20:09:10</remark>
class Totals : Northwind.BusinessProcessBase 
{
-   ShowOrders _parent;
+   ShowOrdersCopy _parent;
-   public Totals(ShowOrders parent)
+   public Totals(ShowOrdersCopy parent)
    {
        _parent = parent;
        Title = "Totals";
        InitializeDataView();
    }

```

### Step 4 - If it has a view
#### Step 4.1 - Duplicate the View class
#### Step 4.2 - Rename the new View class 

##### 4.2.1 -  Rename the View class and it's constructor 
```csdiff
- partial class ShowOrdersView : Northwind.Shared.Theme.Controls.CompatibleForm 
+ partial class ShowOrdersCopyView : Northwind.Shared.Theme.Controls.CompatibleForm 
 {
    ShowOrders _controller;
-   internal ShowOrdersView(ShowOrders controller)
+   internal ShowOrdersCopyView(ShowOrders controller)
    {
        _controller = controller;
        InitializeComponent();
    }
```
##### 4.2.2 - Rename the designer class

![2018 04 20 08H23 23](2018-04-20_08h23_23.png)

```csdiff
- partial class ShowOrdersView
+ partial class ShowOrdersCopyView
 {
    System.ComponentModel.IContainer components;
    Shared.Theme.Colors.DefaultHelpWindow clrDefaultHelpWindow;

```

#### Step 4.3 - Fix the References between the View and the Controller
##### 4.3.1 - Fix the reference from the View to the Controller 
```csdiff
partial class ShowOrdersCopyView : Northwind.Shared.Theme.Controls.CompatibleForm 
{
-   ShowOrders _controller;
+   ShowOrdersCopy _controller;
-   internal ShowOrdersCopyView(ShowOrders controller)
+   internal ShowOrdersCopyView(ShowOrdersCopy controller)
    {
        _controller = controller;
        InitializeComponent();
    }
```

##### 4.3.2 Fix the reference from the Controller to the View 
```csdiff
protected override void OnLoad()
{
    RowLocking = LockingStrategy.OnRowSaving;
    TransactionScope = TransactionScopes.SaveToDatabase;
-   View = () => new Views.ShowOrdersView(this);
+   View = () => new Views.ShowOrdersCopyView(this);
}
```

### Step 5 - For any of the inner Controllers views
#### Step 5.1 - Duplicate the inner Controller's View
#### Step 5.2 - Rename the new View class 

##### 5.2.1 -  Rename the View class and it's constructor 
```csdiff
- partial class ShowOrdersDetails : Northwind.Shared.Theme.Controls.CompatibleForm 
+ partial class ShowOrdersCopyDetails : Northwind.Shared.Theme.Controls.CompatibleForm 
 {
    ShowOrders.Details _controller;
-   internal ShowOrdersDetails(ShowOrders.Details controller)
+   internal ShowOrdersCopyDetails(ShowOrders.Details controller)
    {
        _controller = controller;
        InitializeComponent();
    }
```
##### 5.2.2 - Rename the designer class
```csdiff
- partial class ShowOrdersDetails
+ partial class ShowOrdersCopyDetails
 {
    System.ComponentModel.IContainer components;
    Shared.Theme.Colors.DefaultHelpWindow clrDefaultHelpWindow;
```

#### Step 5.3 - Fix the References between the View and the Controller
##### 5.3.1 - Fix the reference from the View to the Controller 
```csdiff
partial class ShowOrdersCopyDetails : Northwind.Shared.Theme.Controls.CompatibleForm 
{
-   ShowOrders.Details _controller;
+   ShowOrdersCopy.Details _controller;
-   internal ShowOrdersCopyDetails(ShowOrders.Details controller)
+   internal ShowOrdersCopyDetails(ShowOrdersCopy.Details controller)
    {
        _controller = controller;
        InitializeComponent();
    }
```

##### 5.3.2 Fix the reference from the Controller to the View 
```csdiff
protected override void OnLoad()
{
    Exit(ExitTiming.BeforeRow, () => u.Level(1) != "RM");
    RowLocking = LockingStrategy.OnUserEdit;
    SwitchToInsertWhenNoRows = true;
    KeepViewVisibleAfterExit = true;
-   View = () => new Views.ShowOrdersDetails(this);
+   View = () => new Views.ShowOrdersCopyDetails(this);
}
```