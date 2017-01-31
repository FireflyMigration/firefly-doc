### Introduction to BusinessProcess

1.	The second type of program, besides UIController is a BusinessProcess (called “batch task” in Magic).
2.	A BusinessProcess is used to iterate rows of entities and perform business logic operations, without user interaction.
3.	Let’s see a simple example.


#### 1. Count Rows
1.	Create the following new **BusinessProcess** called “CalculateOrders”:

```csdiff
public class CalculateOrders : BusinessProcessBase
{
        
+    Models.Orders Orders = new Models.Orders();

    public CalculateOrders()
    {
+        From = Orders;
    }
``` 

2.	Override the **OnEnd** method and inside the method show a message box with the number of rows using `u.Counter(0)` function.

```csdiff
+ protected override void OnEnd()
+ {
+     MessageBox.Show("Number of rows: " + u.Counter(0));
+ }
```

3.	Add a menu entry to call to this BusinessProcess.
4.	Build and run.
5.	There are other ways to count rows than to iterate them with a BusinessProcess. The purpose of this example is to demonstrate the simplest use of a BusinessProcess.
6.	Note that the BusinessProcess class exposes a **Counter property**, so `u.Counter(0)` is the same as `Counter`. Change the code and run again.
```csdiff
protected override void OnEnd()
{
-    MessageBox.Show("Number of rows: " + u.Counter(0));
+    MessageBox.Show("Number of rows: " + Counter);
}
```
7.	Exercise: Count Row Using a BusinessProcess

#### 2. Sum Rows

1.	The previous example was very simple. Let’s complicate it a little by **summing** a row value, while we are iterating the rows.
2.	Create a `Number _total` variable at the top of the class and **initialize** it with zero.
``` diff
public class CalculateOrders : BusinessProcessBase
    {
        
        Models.Orders Orders = new Models.Orders();
+        Number _total = 0;
```

3.	Override the `OnLeaveRow` method and note that in a BusinessProcess there is no OnSavingRow method like in a UIController, because there is no user interaction. The purpose of a business process is iterating **all** the rows that **match** the filter criteria.
4.	Inside the OnLeaveRow method, add the following code:
```csdiff 
+ protected override void OnLeaveRow()
+ {
+    _total += Orders.Freight;
+ }
```
5.	Inside the OnEnd method, show a message box with the total value.
```csdiff
protected override void OnEnd()
{
    MessageBox.Show("Number of rows: " + Counter);
+    MessageBox.Show("Total value: " + _total);
}
```
6.	Build and run.