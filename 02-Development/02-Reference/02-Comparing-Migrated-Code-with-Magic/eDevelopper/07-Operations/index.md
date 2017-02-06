
# Introduction

This article is one of a series of articles aimed at providing further orientation with the migrated code for Magic programmers. This time we will look at the List of Operations as they appear in eDeveloper (version 9) and show the equivalent representation of each setting in the migrated code.

Let's look at the screen displaying the List of Operations:

![List of Operations](operations1.jpg)

The following sections describe the equivalent migrated code syntax for each operation.

--- 

## Select
Name in Migrated Code: **Columns.Add Method**  
Location in Migrated Code: **InitializeDataView Method**  
The following examples relate to Select:  


### Real Field

```Columns.Add(Orders.OrderId);```

### Virtual Field

```csdiff 
Columns.Add(v_Total);
```

### Init Expression

```csdiff 
v_RowTotal.BindValue(() => Orders.UnitPrice * Orders.Quantity - Orders.Discount);
```

Note: When the same expression in Magic is used for the Range and Init expression, use the BindEqualTo Method instead of the IsEqualTo Method and BindValue Method. Without this, we would have to write the following 2 lines of code:  

```csdiff 
Where.Add(Orders.OrderId.IsEqualTo(3));
Orders.OrderId.BindValue(()=>3); 
```
Instead of the above 2 lines, Write one line using BindEqualTo:

```csdiff 
Where.Add(Orders.OrderId.BindEqualTo(3));
```

### Range

Range is written at the beginning of the **InitializeDataView** Method, using the Where.Add syntax.

Example:

```csdiff 
Where.Add(Orders.OrderId.IsBetween(1,3));
```

Note: When the same expression in Magic is used for the Range and Init expression, use the BindEqualTo Method instead of the IsEqualTo Method and BindValue Method. Instead of writing the following 2 lines of code:

```csdiff 
Where.Add(Orders.OrderId.IsEqualTo(3));
Orders.OrderId.BindValue(()=>3); 
```
..write one line using BindEqualTo:

```csdiff 
Where.Add(Orders.OrderId.BindEqualTo(3));
```

### Locate

Locate is used in the context of the main table  
Locate is written at the beginning of the **InitializeDataView** Method using the **StartOnRowWhere.Add** syntax.  
Example:
```csdiff 
StartOnRowWhere.Add(Orders.OrderId.IsEqualTo(2));
```

---
For the Select operation, See Also:  
  [UIController Columns Add Method and examples](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_Columns.htm)  
  [Business Process Columns Add Method and examples](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_Columns.htm)

---

## Verify
Verify can be either an Error message or a Warning message:

### Error

For Display = Error, use the **Error** Method.
Example:

```csdiff 
Error("Order exceeds the maximum");
```
For Display = Box, use the **ErrorInStatusBar** method
Example:

```csdiff 
ErrorInStatusBar("Order exceeds the maximum");
```

### Warning

For Display = Error, use the **Warning** Method.
Example:
```csdiff 
Warning("Order exceeds the maximum");
```
For Display = Box, use the **WarningInStatusBar** method
Example:

```csdiff 
WarningInStatusBar("Order exceeds the maximum");
```

---

## Link/End Link

Name in Migrated Code: **Relations.Add Method**  
Location in Migrated Code: **InitializeDataView Method**  

### Link Type

The following table shows the .Net equivalents for Magic link types.

| Magic Name | Migrated Code Name |
|------------|--------------------|
| Query      | Find               |
| Write      | InsertIfNotFound   |
| Create     | Insert             |
| InnerJoin  | InnerJoin          |
| L.O.Join   | Join               |

Example Link Find:

```csdiff
Relations.Add(Customers, RelationType.Find, Customers.CustomerID.IsEqualTo(Orders.CustomerID);
```
See also: [Relations Enum](http://www.fireflymigration.com/reference/html/T_Firefly_Box_RelationType.htm)

### Init

Name in Migrated Code: **BindEqualTo**  

For InsertIfNotFound (Link Write), use the BindEqualTo method instead of IsEqualTo to initialize a new linked record with the linked value.  

Example Link Write:

```csdiff
Relations.Add(Customers,Customers.CustomerID.BindEqualTo(Orders.CustomerID);
```

### Locate Expression

For each locate value, the migrated code will show an expression. 
Example:

```csdiff
Relations.Add(Customers, RelationType.Find, Customers.CustomerID.IsEqualTo(Orders.CustomerID).And
   Customers.City.IsequalTo("Madrid");
```

### Index

Use the appropriate Relations.Add overload which supports an index parameter. 
Example:
```csdiff
 Relations.Add(Customers, RelationType.Find, 
  Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByCustomerID);
```

### Ret:

Name in Migrated Code: **NotifyRowWasFoundTo** 
Use an object of type var to Return a variable  
Example:
```csdiff
 readonly BoolColumn nRowFound = new BoolColumn();
// other code
var r = Relations.Add(Customers, RelationType.Find,
   Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByCustomerID);
r.NotifyRowWasFoundTo(nRowFound)
```

### Cnd

Name in Migrated Code: **BindEnabled**  
Example:

```csdiff
var r = Relations.Add(Customers, RelationType.Find, 
      Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByCustomerID);
// other code
var r = relation.add
r.BindEnabled( ()= >Exp_1()
```

---
For further examples of how to use Relations, see also:

[UIController Find Relation and examples](http://www.fireflymigration.com/reference/html/P_Firefly_Box_UIController_Relations.htm)  
[Business Process Find Relation and examples](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_Relations.htm)

---

## Block/End Block

### Block If, Block Else

Name in Migrated Code: **if, else**  
Example:
```csdiff
if(Exp_3())
{
    new GetTotalForOrderID().Run(vOrderID);
}
else 
{
    new GetTotalForAllOrders().Run();
}
```

### Block Loop

Name in Migrated Code: **u.StartBlockLoop**  
Example:
```csdiff
protected override void OnLeaveRow()
        {
            u.StartBlockLoop();
            while(u.AdvanceBlockLoop() &&(vNumerator < 5))
            {
                Categories.CategoryName.Value = u.Trim(Categories.CategoryName);
                vNumerator.Value++;
            }
            u.EndBlockLoop();
```

---

## Call
### Call Task, Call Program

Examples:  
Example of calling a Program:  
```csdiff
new OrderDetails().Run();
```
In the migrated code, a call to a task will appear as a method call, passing an instance of itself as a parameter.  
Example of calling a Task:
```csdiff
new OrderDetails(this).Run();
```

The following properties are available when calling a task or a program:

#### Args

Arguments are passed in the migrated code in the standard .Net way, for example, the following code passes OrderID as an argument:

```csdiff
new Print_Order().Run(Orders.OrderID);
```
In the receiving program, the Run method receives the argument/s, for example:
```csdiff
/// <summary>Print - Order</summary>
/// <param name="ppi_OrderID">pi.Order ID</param>
public void Run(NumberParameter ppi_OrderID)
{
  BindParameter(pi_OrderID, ppi_OrderID);
  Execute();
}
```
Note: For backward compatibility reasons, Migrated code will use parameter types such as NumberParameter, TextParameter etc, as opposed to NumberColumn, TextColumn. This allows the .Net code to behave like Magic, so that, like in Magic, expressions can be passed as parameters too.

#### Frm

This property, determining which GUI screen will be displayed, is passed in the migrated code as a parameter, when calling the Method. An example of this implementation is as follows:

```csdiff
 new Print_Order().Run(Orders.OrderID, new UI.ShowOrders_UI(this));
```
In the called Method, the code will look like this:
```csdiff
public void Run(NumberParameter ppi_OrderID, Firefly.Box.UI.Form view)
{
    BindParameter(pi_OrderID, ppi_OrderID);
    BindView(view);
    Execute();
}
```

#### Ret

The migrated code will define a variable of type Bool, called _taskResult, that will return the required value to the calling Method. The callng Method receives this value.

For example, in the calling Method, a value is returned to v.Done, defined as a Bool:

```csdiff
v_Printed.Value = new Print_Order().Run(Orders.OrderID, new UI.ShowOrders_UI(this));
```
In the called Method, for example, a Bool variable defined in the Class:
```csdiff
Bool _taskResult;
```
The variable is returned, as follows:
```csdiff
vDone.Value = true;
_taskResult = vDone;
```

#### Exp

```csdiff
Application.AllPrograms.RunByIndex(1,asdfds)
```

#### Lock

This property is equivalent to the Lock property in Magic, seen when pressing ctrl+P as displayed below:

The migrated code supports this option by adding the LockCurrentRow() Method before calling the method, for example:
```csdiff
LockCurrentRow();
new Print_Order().Run(); 
```
See also:[LockCurrentRow Method for UIController](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_LockCurrentRow.htm), [LockCurrentRow Method for BusinessProcess](http://www.fireflymigration.com/reference/html/M_Firefly_Box_BusinessProcess_LockCurrentRow.htm)  


### Call Public


### Call UDP

In .Net, Use the UDF User Method defined in ENV.UserMethods.cs Example:
```csdiff
u.UDF("get.get_env", "CLIENTNAME", V_ComputerName);
```

### Call COM

As an example of the usage of COM, in the Class, define a Column as follows:
```csdiff
readonly ComColumn<MMSERVVBLib.OutgoingMessage> FAX = new ComColumn<MMSERVVBLib.OutgoingMessage>("FAX")
{
    CreateInstance = true,
    InstanceType = typeof(MMSERVVBLib.OutgoingMessageClass)
};
```

Then, Call COM as in the following example:
```csdiff
FAX.CallCom(comObj => comObj.Connect(u.ToStringForCom("efax")),vReturnCode);
```

### Call Remote

### Call WebS

---

## Evaluate

Name in Migrated Code: Call a Method
Example: The following DBDEL Evaluate expression in Magic, appears in the migrated .Net code as:
```csdiff
u.DBDel(typeof(Model.Orders), "")
```

### Ret

---

## Update
Name in Migrated Code: Expression
Location in Migrated Code: Override Methods and Handlers 

### How

#### Normal

Example:
```csdiff
v_LineTotal.Value = OrderDetails.UnitPrice * OrderDetails.Quantity - OrderDetails.Discount;
```
#### Incremental

```csdiff
v_LineTotal.Value += DeltaOf(OrderDetails.UnitPrice * OrderDetails.Quantity - OrderDetails.Discount);
```


#### Und

Forgot disable Undo etc…

**UpdateValueWithoutMarkingRowAsChanged**  
  In magic, in an online task when updating a variable from the record prefix or an handle, that update doesn't constitute a change to the row, which means that it'll not cause the RecordSuffix to run and the row will not be updated to the database unless another more meaningfull change have happened. To better represent this behaviour, these updates in the migrated code look as following:
```csdiff
v_Total.UpdateRowWithoutMarkingRowAsChanged(a+b-c);
```
---

## Output Form
Name in Migrated Code: Expression
Example:
```csdiff
 _layout.Customer.WriteTo(_ioPrint_Order);
 ```
For a discussion on working with system files in .Net

For a discussion on how to print a report in .Net

### I/O

### Page

#### Auto

#### Skip

#### Top


## Input Form
Name in Migrated Code: **ReadFrom Method**  
Example:
```csdiff
 _viewReadLine.ReadFrom(_ioImportFile);
```

### I/O

### Dlm

For a discussion on working with system files in .Net

---

## Browse
Name in Migrated Code: FileViewer  
Browse has the following properties:

### Expression

Example: Browse file
```csdiff
new ENV.Utilities.FileViewer("c:\\temp\\test.txt",new UI.Print_Orders_UI(this)).View();
```

### Edt

For Viewing a file, use the View() Method, as in the above example. For editing, use the Edit method. Example:

```csdiff
new ENV.Utilities.FileViewer("c:\\temp\\test.txt",new UI.Print_Orders_Browse(this)).Edit();
```

## Exit
Name in Migrated Code: StartRun  
Example: dir command
```csdiff
  StartRun("dir", false, System.Diagnostics.ProcessWindowStyle.Normal);
```

## Raise Event
The Event type can be system, internal, user defined or public

Example:
```csdiff
Invoke(myEvent);
```
## Remark  
Remarks made in Magic are maintained in migrated code using the .Net syntax for comments  
Example:
```csdiff
// Update the total value for the order
```