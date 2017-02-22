keywords:control verification


```csdiff
protected override void OnSavingRow()
{
+    if (Orders.OrderDate.Year<1990)
+        System.Windows.Forms.MessageBox.Show("Invalid Year");
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/V7iIlaEIQkg?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>