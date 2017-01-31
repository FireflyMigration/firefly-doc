### Cached
1.	When we call a BusinessProcess task from the parent controller, the constructor of the BusinessProcess is executed each time and that can be non-efficient in extreme scenarios, for example if the sub BusinessProcess is being called multiple times, especially if it’s a report, but don’t worry about performance on a daily basis. Only when a profiler tells you that there is a problem.
2.	Add a message box to the child task constructor and see that without Cached it is being called for each row of the parent.
3.	Change the call to use the `Cached<>` method:
```csdiff
protected override void OnEnterRow()
{
-    new CalculateOrderTotal().Run(Orders.OrderID, TotalValue);
+    Cached<CalculateOrderTotal>().Run(Orders.OrderID, TotalValue);

}
```
Now the message in the constructor is displayed only once.

*Remember To Tell them not to change to FLOW UI**

3.	Exercise: Cached

