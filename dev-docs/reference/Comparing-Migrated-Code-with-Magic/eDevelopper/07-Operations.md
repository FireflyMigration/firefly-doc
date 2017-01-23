
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

```csharp 
Columns.Add(v_Total);
```

### Init Expression

```csharp 
v_RowTotal.BindValue(() => Orders.UnitPrice * Orders.Quantity - Orders.Discount);
```

Note: When the same expression in Magic is used for the Range and Init expression, use the BindEqualTo Method instead of the IsEqualTo Method and BindValue Method. Without this, we would have to write the following 2 lines of code:  

```csharp 
Where.Add(Orders.OrderId.IsEqualTo(3));
Orders.OrderId.BindValue(()=>3); 
```
Instead of the above 2 lines, Write one line using BindEqualTo:

```csharp 
Where.Add(Orders.OrderId.BindEqualTo(3));
```

### Range

Range is written at the beginning of the **InitializeDataView** Method, using the Where.Add syntax.

Example:

```csharp 
Where.Add(Orders.OrderId.IsBetween(1,3));
```

Note: When the same expression in Magic is used for the Range and Init expression, use the BindEqualTo Method instead of the IsEqualTo Method and BindValue Method. Instead of writing the following 2 lines of code:

```csharp 
Where.Add(Orders.OrderId.IsEqualTo(3));
Orders.OrderId.BindValue(()=>3); 
```
..write one line using BindEqualTo:

```csharp 
Where.Add(Orders.OrderId.BindEqualTo(3));
```

### Locate

Locate is used in the context of the main table  
Locate is written at the beginning of the **InitializeDataView** Method using the **StartOnRowWhere.Add** syntax.  
Example:
```csharp 
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

```csharp 
Error("Order exceeds the maximum");
```
For Display = Box, use the **ErrorInStatusBar** method
Example:

```csharp 
ErrorInStatusBar("Order exceeds the maximum");
```

### Warning

For Display = Error, use the **Warning** Method.
Example:
```csharp 
Warning("Order exceeds the maximum");
```
For Display = Box, use the **WarningInStatusBar** method
Example:

```csharp 
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

```csharp
Relations.Add(Customers, RelationType.Find, Customers.CustomerID.IsEqualTo(Orders.CustomerID);
```
See also: [Relations Enum](http://www.fireflymigration.com/reference/html/T_Firefly_Box_RelationType.htm)

### Init

Name in Migrated Code: **BindEqualTo**  

For InsertIfNotFound (Link Write), use the BindEqualTo method instead of IsEqualTo to initialize a new linked record with the linked value.  

Example Link Write:

```csharp
Relations.Add(Customers,Customers.CustomerID.BindEqualTo(Orders.CustomerID);
```

### Locate Expression

For each locate value, the migrated code will show an expression. 
Example:

```csharp
Relations.Add(Customers, RelationType.Find, Customers.CustomerID.IsEqualTo(Orders.CustomerID).And
   Customers.City.IsequalTo("Madrid");
```

### Index

Use the appropriate Relations.Add overload which supports an index parameter. 
Example:
```csharp
 Relations.Add(Customers, RelationType.Find, 
  Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByCustomerID);
```

### Ret:

Name in Migrated Code: **NotifyRowWasFoundTo** 
Use an object of type var to Return a variable  
Example:
```csharp
 readonly BoolColumn nRowFound = new BoolColumn();
// other code
var r = Relations.Add(Customers, RelationType.Find,
   Customers.CustomerID.IsEqualTo(Orders.CustomerID), Customers.SortByCustomerID);
r.NotifyRowWasFoundTo(nRowFound)
```

### Cnd

Name in Migrated Code: **BindEnabled**  
Example:

```csharp
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
```csharp
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
```csharp
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
```csharp
new OrderDetails().Run();
```
In the migrated code, a call to a task will appear as a method call, passing an instance of itself as a parameter.  
Example of calling a Task:
```csharp
new OrderDetails(this).Run();
```

The following properties are available when calling a task or a program:

#### Args

Arguments are passed in the migrated code in the standard .Net way, for example, the following code passes OrderID as an argument:

```csharp
new Print_Order().Run(Orders.OrderID);
```
In the receiving program, the Run method receives the argument/s, for example:
```csharp
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

```csharp
 new Print_Order().Run(Orders.OrderID, new UI.ShowOrders_UI(this));
```
In the called Method, the code will look like this:
```csharp
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

```csharp
v_Printed.Value = new Print_Order().Run(Orders.OrderID, new UI.ShowOrders_UI(this));
```
In the called Method, for example, a Bool variable defined in the Class:
```csharp
Bool _taskResult;
```
The variable is returned, as follows:
```csharp
vDone.Value = true;
_taskResult = vDone;
```

#### Exp

```csharp
Application.AllPrograms.RunByIndex(1,asdfds)
```

#### Lock

This property is equivalent to the Lock property in Magic, seen when pressing ctrl+P as displayed below:

The migrated code supports this option by adding the LockCurrentRow() Method before calling the method, for example:
```csharp
LockCurrentRow();
new Print_Order().Run(); 
```
See also:[LockCurrentRow Method for UIController](http://www.fireflymigration.com/reference/html/M_Firefly_Box_UIController_LockCurrentRow.htm), [LockCurrentRow Method for BusinessProcess](http://www.fireflymigration.com/reference/html/M_Firefly_Box_BusinessProcess_LockCurrentRow.htm)  


### Call Public


### Call UDP

In .Net, Use the UDF User Method defined in ENV.UserMethods.cs Example:
```csharp
u.UDF("get.get_env", "CLIENTNAME", V_ComputerName);
```

### Call COM

As an example of the usage of COM, in the Class, define a Column as follows:
```csharp
readonly ComColumn<MMSERVVBLib.OutgoingMessage> FAX = new ComColumn<MMSERVVBLib.OutgoingMessage>("FAX")
{
    CreateInstance = true,
    InstanceType = typeof(MMSERVVBLib.OutgoingMessageClass)
};
```

Then, Call COM as in the following example:
```csharp
FAX.CallCom(comObj => comObj.Connect(u.ToStringForCom("efax")),vReturnCode);
```

### Call Remote

### Call WebS

---

## Evaluate

Name in Migrated Code: Call a Method
Example: The following DBDEL Evaluate expression in Magic, appears in the migrated .Net code as:
```csharp
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
```csharp
v_LineTotal.Value = OrderDetails.UnitPrice * OrderDetails.Quantity - OrderDetails.Discount;
```
#### Incremental

```csharp
v_LineTotal.Value += DeltaOf(OrderDetails.UnitPrice * OrderDetails.Quantity - OrderDetails.Discount);
```


#### Und

Forgot dusable Undo etc…

**UpdateValueWithoutMarkingRowAsChanged**  
  In magic, in an online task when updating a variable from the record prefix or an handle, that update doesn't constutite a change to the row, which means that it'll not cause the RecordSuffix to run and the row will not be updated to the database unless another more meaningfull change have happened. To better represent this behaviour, these updates in the migrated code look as following:
```csharp
v_Total.UpdateRowWithoutMarkingRowAsChanged(a+b-c);
```
---

## Output Form
Name in Migrated Code: Expression
Example:
```csharp
 _layout.Customer.WriteTo(_ioPrint_Order);
 ```
For a discussion on working with system files in .Net, see: Working with System Files

For a discussion on how to print a report in .Net, see: Printing a Report

### I/O

### Page

#### Auto

#### Skip

#### Top


## Input Form
Name in Migrated Code: **ReadFrom Method**  
Example:
```csharp
 _viewReadLine.ReadFrom(_ioImportFile);
```

### I/O

### Dlm

For a discussion on working with system files in .Net, see: [Working with System Files](http://www.fireflymigration.com/doc/doku.php/articles/working_with_system_files)

---

## Browse
Name in Migrated Code: FileViewer  
Browse has the following properties:

### Expression

Example: Browse file
```csharp
new ENV.Utilities.FileViewer("c:\\temp\\test.txt",new UI.Print_Orders_UI(this)).View();
```

### Edt

For Viewing a file, use the View() Method, as in the above example. For editing, use the Edit method. Example:

```csharp
new ENV.Utilities.FileViewer("c:\\temp\\test.txt",new UI.Print_Orders_Browse(this)).Edit();
```

## Exit
Name in Migrated Code: StartRun  
Example: dir command
```csharp
  StartRun("dir", false, System.Diagnostics.ProcessWindowStyle.Normal);
```

## Raise Event
The Event type can be system, internal, user defined or public

Example:
```csharp
Invoke(myEvent);
```
## Remark  
Remarks made in Magic are maintained in migrated code using the .Net syntax for comments  
Example:
```csharp
// Update the total value for the order
```