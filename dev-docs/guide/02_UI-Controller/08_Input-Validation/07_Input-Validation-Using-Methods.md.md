# Introduction to User Methods and the u Member 

```csdiff
protected override void OnSavingRow()
{
-    if (Orders.OrderDate.Year < 1990 || Orders.OrderDate.Year>2020)
+    if (u.Year( Orders.OrderDate) < 1990 || Orders.OrderDate.Year>2020)
    {
        Message.ShowError("Invalid Year");
    }
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/GKo8FHW_X6c?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>

